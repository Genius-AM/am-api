<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CalendarRequest;
use App\Http\Resources\CalendarResource;
use App\Models\Calendar;

class CalendarController extends Controller
{
    public function WithDraw()
    {
        $events = Calendar::all();

        return view('admin.calendar', compact('events'));
    }


    public function storeNewEvent(CalendarRequest $request)
    {
        $event = new Calendar();
        $event->event = $request->input('event');
        $event->save();

        return redirect()->back();
    }

    public function update(CalendarRequest $request,Calendar $calendar)
    {
        $calendar->update($request->validated());

        return new CalendarResource($calendar);
    }
}
