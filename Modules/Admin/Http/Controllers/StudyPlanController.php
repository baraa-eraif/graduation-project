<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Semester;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Admin\Http\Resources\SemesterResource;
use Modules\Base\Http\Controllers\BaseController;

class StudyPlanController extends BaseController
{

    protected $config = [
        'deleteBtn' => false,
        'showAction' => true,
    ];

    public $viewShow = 'admin.pages.studyPlan.show';


    public function show($model)
    {
        $this->model = $this->find($model);
        $resource = SemesterResource::collection($this->model->semesters)->toArray(\request());
        return view($this->viewShow, ['collection' => $resource, 'study_plan_id' => $model]);
    }

    public function accreditation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'number_of_hour' => 'max:18'
        ]);


        if ($validator->fails())
            return response()->json(array('status' => false, 'message' => 'عذراً الرجاء التاكد من القيم المدخلة'));

        Semester::where('id',$request->id)->update(array_merge($request->only(array('end_date','start_date','number_of_hour')),array(
            'status' => 'approved'
        )));
        return response()->json(array('status' => true, 'message' => 'تم التحديث بنجاح'));
    }


}
