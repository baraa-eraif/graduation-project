<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\StudentWallet;
use App\Models\Student;
use App\Models\StudentCourse;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Resources\StudentResource;
use Modules\Base\Http\Controllers\BaseController;

class FinancialController extends Controller
{
    //

    public function view()
    {
        return view('admin.pages.financial.index');
    }

    public function searchStudent()
    {
        $students = [];
        if ($q = request()->get('q')) {
            $students = Student::query()->where(function ($query) use ($q) {
                $query->where('student_id', 'LIKE', '%' . $q . '%');
            })->get()->mapInto(StudentResource::class)->toArray();
        }
        return response()->json(array('status' => true, 'view' => view('admin.pages.financial.rendaredList', array('students' => $students))->render()));
    }

    public function studentProfile($student_id)
    {
        $student = Student::where('student_id', $student_id)->first();
        return view('admin.pages.financial.studentProfile', compact('student'));
    }

    public function addAmount(Request $request)
    {
        $student = Student::where('student_id', $request->get('student_id'))->first();
        $amount = $request->get('amount');
        (new StudentWallet())->setAmount($amount)
            ->setStudentModel($student)
            ->setSourceModel(Student::class)->setSourceId($student->id)
            ->setTransactionType(StudentWallet::CASH_DEPOSIT_TRANSACTION_TYPE)
            ->execute();

        $student = (new StudentResource($student))->serializeForFinancialInfo(\request());
        $view = view('admin.pages.financial.student_info',$student)->render();

        return response()->json(array('status' => true, 'message' => ' الى رصيد الطلب ' . $amount . 'تم اضافة مبلغ ','view' => $view));
    }

}
