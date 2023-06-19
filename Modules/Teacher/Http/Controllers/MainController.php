<?php

namespace Modules\Teacher\Http\Controllers;

use App\Models\CalendarEvent;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
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
        $calendarEvents = auth()->user()->calendarEvents;
        $events = $calendarEvents ? $calendarEvents->map(function ($model) {
            return array(
                'id' => $model->id,
                'title' => $model->title,
                'start' => $model->start,
                'end' => $model->end,
            );
        }) : [];

         return view('teacher.dashboard.index',compact('events'));
    }


}
