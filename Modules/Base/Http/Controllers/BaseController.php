<?php

namespace Modules\Base\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BaseModel;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Modules\Base\Http\Requests\BaseRequest;
use Modules\Base\Http\Resources\BaseResource;
use Modules\Base\Traits\getSupport;
use Modules\Base\Traits\SheetManger;


class BaseController extends Controller
{
    use getSupport, SheetManger;

    /**
     * Instance Model
     *
     */
    public $model;
    /**
     * Instance Resource
     *
     */
    public $resource;
    /**
     * @returns $model_name
     *
     */
    public $model_name;
    /**
     * @returns $view index {blade}
     */
    public $viewIndex = 'dash.list.index';
    /**
     * @returns $view index {blade}
     */
    public $viewForm = 'dash.form.index';
    /**
     * @returns $form path
     *
     */
    public $viewShow;
    /**
     * @returns $form path
     *
     */
    public $collection;
    /**
     * redirect route
     */
    public $route;
    /**
     * View
     *
     */
    public $route_input;
    /**
     * redirect to login
     */
    public $logout_route;
    /**
     * Instance from import modeule
     */
    public $import;
    /**
     * Instance from export modeule
     */
    public $export;
    /**
     * default search key list
     */
    public $serach_key = 'name';
    /**
     * default paginate
     */
    const PAGINATE_PER_PAGE = 10;
    /**
     * default paginate
     */
    public $viewActions;
    /**
     * destroy modeling
     */
    public $destroy_model;
    /**
     * column Observe
     */
    public $requirePaginate = true;
    /**
     * compacted data
     */
    public $compact;
    /**
     * compacted data
     */
    public $pagination_model;
    /**
     * compacted data
     */
    public $query;
    /**
     * compacted data
     */
    public $trashQuery;
    /**
     * compacted data
     */
    public $trashActions = false;

    /**
     * redirect after created||updated
     */
    public $custom_redirect = null;

    public $orderByKey;

    protected $baseView;


    protected $appended_actions = [];


    public $request = BaseRequest::class;

    /**
     * set instance from model
     * set instance from resource
     * set compact to index view
     * defined model name (lower case)
     */
    public function __construct()
    {
        $this->modelPath = $this->getDefaultModel();
        $this->setModel($this->__InstanceModel());
        if (!$this->columns)
            $this->columns = $this->getModel()->getColumns();
        $this->setResource(class_exists($this->getDefaultResource()) ? $this->getDefaultResource() : BaseResource::class);
        $this->setRequest(class_exists($this->getDefaultRequest()) ? $this->getDefaultRequest() : BaseRequest::class);
        $this->setCompact();
        $this->model_name = strtolower(class_basename($this->modelPath));
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = $this->getQuery();
            return response()->json(['data' => $this->resource::Collection($query->ordered()->get())->toArray(request()),
                'recordsFiltered' => $query->paginate()->total(), 'recordsTotal' => $query->paginate(self::PAGINATE_PER_PAGE)->total() ?? 0], 200,);
        }
        return view($this->viewIndex, $this->compact);
    }

    public function all($model = null)
    {
        $__model = $model ?: $this->model;
        if (!$model && $__model->getTable()) {
            if ($this->requirePaginate)
                $this->pagination_model = $__data = $__model->paginate(self::PAGINATE_PER_PAGE);
            else
                $__data = $__model;
            return $this->resource::Collection($__data->all())->toArray(request());
        } else
            return [];
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $resource = new $this->resource($this->model);
        return view($this->viewForm, $resource->serializeForCreate(\request(), $this->resource));
    }

    /**
     * Store a newly created resource in storage.
     * @sync user_id && company_id
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function getAttributes($request)
    {
        $data = $request->all();

        $images = $this->imageUpload($request);
        if (count($images))
            $data = array_merge($data,$images);

        if (isset($data['password']) && in_array('password', $this->model->getFillable()))
            $data['password'] = Hash::make($data['password']);
        else
            unset($data['password']);

        return $data;
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate((new $this->request)->rules(), (new $this->request)->messages());
        try {
            $data = $this->getAttributes($request);
            $model = $this->getModel()->create($data);
            $this->saving($model, $request);
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
        return redirect()->route($this->custom_redirect ?? current_route() . '.index')
            ->with('alert.success', __("lang.stored_successfully"));
    }


    public function find($model)
    {
        return $this->getModel()->findOrFail($model);
    }
    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($model)
    {
        $this->model = $this->find($model);
        $resource = (new $this->resource($this->model));
        return view($this->viewShow, $resource->serializeForShow(request()));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($model)
    {
        $this->model = $this->find($model);
        $resource = (new $this->resource($this->model));
        return view($this->viewForm, $resource->serializeForEdit(request(), $this->resource));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $data = $this->getAttributes($request);
        $model = $this->find($id);
        $model->update($data);
        $this->saving($model, $request);
        return redirect()->route($this->custom_redirect ?? current_route() . '.index')
            ->with('alert.primary', __("lang.updated_successfully"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $model
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saving($model, $request)
    {
        return $this->created($model);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $model
     * @return \Illuminate\Http\JsonResponse
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function deleteGroup(Request $request)
    {
        $this->destroy($request->get('group'));
    }

    /**
     * @param $model
     * @return \Illuminate\Http\JsonResponse
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     * delete one recorde on database
     */
    public function destroy($model)
    {
        if (!request()->get('is_trash')) {
            $_model = $this->model::whereIn('id', $model);
            $_model->delete();
        } else {
            $model = $this->model::withTrashed()->whereIn('id', $model);
            $model->forceDelete();
        }
        return response()->json(['status' => true, 'message' => __('messages.done_successfully')], 200);
    }


//    public function __AfterDeleting($model)
//    {
//        $function = $this->destroy_model->getObserverFunction();
//        if (isset($function, $model))
//            if (!function_exists($function))
//                return $this->$function($model, []);
//    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return array
     */

    public function imageUpload(Request $request): array
    {
        $images = [];
        if (is_array($request->allFiles()) && count($request->allFiles())) {
            foreach ($request->allFiles() as $key => $value) {
                $request->validate([
                    $key => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                ]);
                if ($request->hasFile($key) && $request->file($key)->isValid()) {
                    $image = $request->file($key);
                    $images[$key] = Storage::disk('public')->put('image', $image);
                }
            }
        }

        return $images;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function trash()
    {
        $query = $this->model::onlyTrashed();
        $this->setTrashQuery($query);
        $this->compact = array_merge($this->compact, ['trash' => true]);
        return $this->index();
    }

    public function restore(Request $request)
    {
        $model = $this->model::onlyTrashed()->findOrFail($request->get('id'));
        $model->restore();
        return response()->json(['status' => true, 'message' => __('messages.done_successfully')], 200);
    }


    public function forceDelete(Request $request)
    {
        collect($request->get('group'))->map(function ($value) {
            $model = $this->getModel()::withTrashed()->findOrFail($value);
            $model->forceDelete();
        });
        return response()->json(['status' => true, 'message' => __('messages.done_successfully')], 200);
    }

    public function created($model)
    {
        return true;
    }

    public function updated($model)
    {
        return true;
    }

    public function __ImportDataManager($data)
    {
        $this->model->create($data);
        return redirect()->route(current_route() . '.index')
            ->with('alert.success', __("lang.stored_successfully"));
    }


    public function setQuery($query)
    {
        $this->query = $query;
        return $this;
    }

    public function queryLength($query)
    {
        if (request()->has(['start', 'length']))
            $this->setQuery($query->skip(request()->get('start'))->take(request()->get('length')));
        return $this;
    }

    public function getQuery()
    {
        $query = $this->model->query()->search(request());
        $this->queryLength($query);
        return $query;
    }

    public function additinalData()
    {
        return [];
    }

    public function setTrashQuery($query)
    {
        $this->trashQuery = $query;
    }

    public function getTrashQuery()
    {
        return $this->trashQuery;
    }

}
