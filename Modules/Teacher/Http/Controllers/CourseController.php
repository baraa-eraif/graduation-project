<?php

namespace Modules\Teacher\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\StudentCourse;
use Illuminate\Http\Request;
use Modules\Base\Http\Controllers\BaseController;
use Modules\Teacher\Http\Resources\StudentCourseResource;
use Modules\Teacher\Http\Resources\StudentResource;

class CourseController extends BaseController
{
    protected $config = array(
        'addBtn' => false,
        'editBtn' => false,
        'deleteBtn' => false,
        'deleteGroupAction' => false,
        'deleteAction' => false,
        'importBtn' => false,
        'trash' => false,
        'showAction' => true
    );

    protected $columns = array(
        'id', 'course_ident', 'name', 'hour_number'
    );
    public $viewShow = 'teacher.pages.course.show';


    public function show($model)
    {
        $course = Course::find(request()->get('model', $model));
        if (request()->ajax()) {
            $query = $course->students();
            return response()->json([
                'data' => $query->ordered()->get()->mapInto(StudentCourseResource::class)->map->additional(array('course' => $course))->toArray(request()),
                'recordsFiltered' => $query->paginate()->total(), 'recordsTotal' => $query->paginate(self::PAGINATE_PER_PAGE)->total() ?? 0
            ], 200,);
        }

//        $this->setConfig(array_merge($this->config, array('showAction' => false)))->setCompact($course, array('columns_args' => array('id', 'course_name', 'course_ident', 'midterm_grade', 'final_term_grade', 'activities_grades',)));
        $compact = get_data_table_source(
            $course,
            array('id', 'student_name', 'student_ident', 'midterm_grade', 'final_term_grade', 'activities_grades'),
            array('config' => NO_ACTIONS_LIST, 'editable_input' => array('midterm_grade', 'final_term_grade', 'activities_grades'),
                'appended_actions' => array('accreditation'))
        );
        return view($this->viewIndex, $compact, array(
            'endpoint' => current_route() . '?model=' . $model,));
    }

    public function evaluation(Request $request)
    {
        $model = StudentCourse::find($request->get('row_id'));
        $model->update($request->all());

        $student_id = $model->refresh()->student_id;
        $courses = StudentCourse::where('student_id', $student_id)->get();
        $totalCreditHours = 0;
        $totalGradePoints = 0;

        // Calculate the total credit hours and grade points
        foreach ($courses as $course) {
            $creditHours = get($course, 'course.hour_number');

            $grade = min($course->activities_grades + $course->final_term_grade + $course->midterm_grade, 100);

            $totalCreditHours += $creditHours;
            $totalGradePoints += $grade * $creditHours;
        }
        $gpa = $totalGradePoints / $totalCreditHours;
        Student::find($student_id)->update(array('gpa' => $gpa));
        return response()->json(array('status' => true, 'message' => __("lang.updated_successfully")));
    }


    public function accreditation(Request $request)
    {
        $model = StudentCourse::find($request->get('id'));
        $course_name = get($model,'course.course_ident');
        $grade = min($model->activities_grades + $model->final_term_grade + $model->midterm_grade, 100);
        send_notification_for_models(trans('lang.accreditation_message',array('course_name' => $course_name,'grade' => $grade)), $model->student ?? null);
        $status = $grade > 60 ? 'passed' : 'fail';
        $model->update(array('status' => $status));
        return response()->json(array('status' => true, 'message' => __("lang.updated_successfully")));
    }


}
