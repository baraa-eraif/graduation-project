<?php

namespace Modules\Base\Traits;

use App\Models\CalendarEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait CalendarDataSource
{

    public function events()
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

        $base = Str::before(current_route(),'.');
        return view("$base.pages.calendar.index", array('events' => $events));
    }


    public function addEvent(Request $request)
    {
        CalendarEvent::create(array_merge($request->all(), array(
            'eventable_id' => auth()->id(),
            'eventable_type' => get_class(auth()->user())
        )));
        return response()->json(array('status' => true));
    }

    public function deleteEvent(Request $request, $id)
    {
        CalendarEvent::find($id)->delete();
        return response()->json(array('status' => true));
    }
}



