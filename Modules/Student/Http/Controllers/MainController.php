<?php

namespace Modules\Student\Http\Controllers;

use App\Models\Notification;
use App\Models\Student;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
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
        $data = [];
        $data['notifications'] = Notification::query()->where('sourceable_model', Student::class)
            ->where(function ($query) {
                $query->where('sourceable_id', auth()->id())->orWhereNull('sourceable_id');
            })->latest()->limit(2)->pluck('text')->toArray();
        $passed_hour = auth()->user()->registrationCourses()->where('status', 'passed')->sum('course_data->hour_number') ?? 0;
        $specialization_hours = get(auth()->user(), 'specialization.number_of_hour', 0);
        $data['remind_hour'] = $specialization_hours - $passed_hour;
        $data['passed_hour'] = $passed_hour;
        $data['enrolled_hours'] = auth()->user()->enrolled_hours ?? 0;
        return view('student.dashboard.index', $data);
    }




}
