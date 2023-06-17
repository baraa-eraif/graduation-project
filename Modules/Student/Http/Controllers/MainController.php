<?php

namespace Modules\Student\Http\Controllers;

use App\Models\Notification;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data = [];
        $data['notifications'] = Notification::query()->latest()->limit(2)->pluck('text')->toArray();
        $passed_hour = auth()->user()->registrationCourses()->where('status','passed')->pluck('course_data')->sum('hour_number') ?? 0;
        $specialization_hours = get(auth()->user(),'specialization.number_of_hour',0);
        $data['remind_hour'] = $specialization_hours - $passed_hour;
        $data['passed_hour'] =  $passed_hour;
        return view('student.dashboard.index',$data);
    }


}
