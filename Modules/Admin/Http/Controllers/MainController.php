<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Blog;
use App\Models\Course;
use App\Models\Specialization;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Resources\StudentResource;
use Modules\Base\Traits\CalendarDataSource;

class MainController extends Controller
{
    use CalendarDataSource;

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data['studentCount'] = Student::query()->count();
        $data['teacherCount'] = Teacher::query()->count();
        $data['specializationCount'] = Specialization::query()->count();
        $data['courseCount'] = Course::query()->count();
        $data['blogs'] = Blog::all();
        $data['course_columns'] = array('course_ident', 'name', 'hour_number');
        $data['course_collection'] = Course::query()->latest()->limit(5)->get();
        $data['student_columns'] = array('student_id', 'email', 'name');
        $data['student_collection'] = StudentResource::collection(Student::query()->latest()->limit(5)->get())->toArray(\request());
        return view('admin.dashboard.index',$data);
    }


}
