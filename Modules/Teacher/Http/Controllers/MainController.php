<?php

namespace Modules\Teacher\Http\Controllers;

use App\Models\CalendarEvent;
use App\Models\Notification;
use App\Models\Teacher;
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
        $data = [];
        $data['notifications'] = Notification::query()->where('sourceable_model', Teacher::class)
            ->where(function ($query) {
                $query->where('sourceable_id', auth()->id())->orWhereNull('sourceable_id');
            })->latest()->limit(2)->pluck('text')->toArray();
        $calendarEvents = auth()->user()->calendarEvents;
        $data['events'] = $calendarEvents ? $calendarEvents->map(function ($model) {
            return array(
                'id' => $model->id,
                'title' => $model->title,
                'start' => $model->start,
                'end' => $model->end,
            );
        }) : [];

         return view('teacher.dashboard.index',$data);
    }


}
