<?php


namespace Modules\Base\Traits;

use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use League\Flysystem\NotSupportedException;
use Modules\Base\Http\Resources\BaseResource;
use function collect;
use function getClassPath;
use function models_path;
use function request;
use function routeContains;
use function routeEndsWith;
use function trans;

trait getSupport
{
    protected $type;
    protected $modelPath;

    protected $config;


    protected $columns = array();

    /**
     * @return mixed $model instance
     * @author BaraaEraif
     */

    public function __InstanceModel()
    {
        if ($this->model)
            return new $this->model;

        if (!$this->modelPath)
            throw new NotSupportedException('Model not supported');
        $modelPath = getClassPath($this->modelPath);
        request()['resource_path'] = $modelPath;
        return new $this->modelPath;
    }


    /**
     * @return mixed
     * @author BaraaEraif
     */

    public function getDefaultResource()
    {
        return str_replace(["Controllers", "Controller"], ["Resources", "Resource"], get_class($this));
    }

    public function getDefaultExcel()
    {
        return str_replace(["Controllers", "Controller"], ["Exports\Resources", "Resource"], get_class($this));
    }

    public function getDefaultModel()
    {
        return models_path(str_replace("Controller", "", get_class_name($this)));
    }

    public function getDefaultRequest()
    {
        return str_replace(["Controllers", "Controller"], ["Requests", "Request"], get_class($this));
    }
    /**
     * @param mixed ...$auth
     * @return void $type auth user
     * @author BaraaEraif
     */
    public function userAuthorize(...$auth)
    {
        collect($auth)->map(function ($type) {
            Gate::authorize($type);
        });
    }


    public function setCompact($model = null, $others = [])
    {
        if (!$this->pagination_model)
            $this->pagination_model = null;
        $_model = $model ?? $this->model;
        $columns = get_columns_data(get($others, 'columns', $this->columns ?? $_model->getColumns() ?? []));
        $this->compact = array_merge([
            'model' => $_model,
            'data_table' => $columns,
            'trashActions' => $this->trashActions,
            'additinal' => $this->additinalData(),
            'config' => $this->getConfig(),
            'appended_actions' => $this->appended_actions,
            'list_columns' => $this->columns
        ], $others);
        return $this;
    }


    public function getcompact()
    {
        return $this->compact;
    }


    public function getPath()
    {
        $root = explode('.', Route::currentRouteName());
        return $root[0] . '.' . $root[1];
    }

    public function setResource($resource)
    {
        $this->resource = $resource;
    }

    public function setRequest($request)
    {
        $this->request = $request;
    }
    public function getResource()
    {
        return $this->resource;
    }

    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    public function getModel()
    {
        return $this->model;
    }


    public function setConfig($config)
    {
        $this->config = $config;
        return $this;
    }

    public function getConfig()
    {
        return $this->config;
    }
//    public function setView()
//    {
//        $route_name = Route::current()->getAction()['as'];
//        $explode = explode('.',$route_name);
//        $this->baseView = "$explode[0].pages.$explode[1].$explode[2]";
//    }
}
