<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\StudentWallet;
use App\Models\Course;
use App\Models\EnrollCourseRequest;
use App\Models\Specialization;
use App\Models\Student;
use App\Models\StudentCourse;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Base\Http\Controllers\BaseController;

class EnrollCourseRequestController extends BaseController
{
    protected $config = NO_ACTIONS_LIST;
    protected $appended_actions = array(
        'accept', ['model' => 'reject', 'class' => 'danger']
    );

    public function getQuery()
    {
        $q = parent::getQuery(); // TODO: Change the autogenerated stub
        return $q->where('status', 'pending');
    }

    public function reject(Request $request)
    {
        $this->updateRequestStatus($request, 'rejected');
        return response()->json(array('status' => true, 'message' => 'تم تحديث حالة الطلب'));
    }

    public function accept(Request $request)
    {
        DB::beginTransaction();
        try {
        $model = $this->updateRequestStatus($request, 'accepted');
        $specialization = Specialization::find(get($model, 'student_data.specialization_id'));
        $student = $model->student;
        if (!$student)
            return redirect()->back()->withErrors('الطالب غير مسجل');

        $course = StudentCourse::updateOrCreate(array(
            'student_id' => $model->student_id,
            'course_id' => $model->course_id,
        ), array(
            'student_id' => $model->student_id,
            'course_id' => $model->course_id,
            'course_data' => $model->course_data,
            'student_data' => $model->student_data,
        ));

        (new StudentWallet())->setAmount(get($specialization,'hour_price',0))
            ->setStudentModel($model->student)
            ->setSourceModel(StudentCourse::class)->setSourceId($course->id)
            ->setTransactionType(StudentWallet::REGISTRATION_COURSE_TRANSACTION_TYPE)
            ->execute();

        DB::commit();
            $course_name = get($model,'course.course_ident');
            send_notification_for_models(trans('lang.accept_enroll_request_message',array('course_name' => $course_name)), $student);
            $passed_hours = $student->registrationCourses()->where('status','passed')->sum('course_data->hour_number');
            $student->update(array('enrolled_hours' => $passed_hours));
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
        return response()->json(array('status' => true, 'message' => 'تم تحديث حالة الطلب'));
    }

    protected function updateRequestStatus($request, $status)
    {
        $model = EnrollCourseRequest::find($request->id);
        $model->update(array('status' => $status));
        return $model->refresh();
    }
}
