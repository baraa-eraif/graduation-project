<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Course;
use App\Models\StudentCourse;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Resources\accreditationGradesResource;
use Modules\Base\Http\Controllers\BaseController;

class accreditationGradesController extends BaseController
{

    public $model = StudentCourse::class;
    public $resource = accreditationGradesResource::class;
    protected $config = [
        'addBtn' => false,
        'editBtn' => false,
        'deleteBtn' => false,
        'deleteGroupAction' => false,
        'deleteAction' => false,
        'importBtn' => false,
        'trash' => false,
        'showAction' => false,
        'filter_inputs' => [
            [
                'type' => 'select',
                'model' => 'teacher_id',
                'label' => 'admin_teacher_id',
                'endpoint' => [
                    'option_value' => 'id',
                    'option_name' => 'name',
                ],
            ],
        ],
        'slot' => 'dash.list.components.admin_courses'
    ];

    public function index()
    {
        if (request()->ajax()) {
            $requestValue = explode(',', request()->get('search')['value']);
            $query = $this->getQuery()->where('teacher_id', get($requestValue, '1'));
            $enabled_accreditation = $query->where('accreditation_status', StudentCourse::TEACHER_ACCREDITATION)->exists();
            return response()->json(['data' => $this->resource::Collection($query->ordered()->get())->toArray(request()),
                'recordsFiltered' => $query->paginate()->total(),
                'recordsTotal' => $query->paginate(self::PAGINATE_PER_PAGE)->total() ?? 0,
                'enabled_accreditation' => $enabled_accreditation,
                'teacher_id' => get($requestValue, '1')], 200,);
        }
        return view($this->viewIndex, $this->compact);
    }

    public function accreditation(Request $request)
    {
        StudentCourse::where(array('accreditation_status' => StudentCourse::TEACHER_ACCREDITATION, 'teacher_id' => $request->get('id')))->get()->each(function ($model) {
            $course_name = get($model, 'course.name');
            $grade = min($model->activities_grades + $model->final_term_grade + $model->midterm_grade, 100);
            send_notification_for_models(trans('lang.accreditation_message', array('course_name' => $course_name, 'grade' => $grade)), $model->student ?? null);
            $status = $grade > 60 ? 'passed' : 'fail';

            $model->update(array('accreditation_status' => StudentCourse::ADMIN_ACCREDITATION, 'status' => $status,));
        });

        return response()->json(array('status' => true, 'message' => __("lang.updated_successfully")));
    }
}
