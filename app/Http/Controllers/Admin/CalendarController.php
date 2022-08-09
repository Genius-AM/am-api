<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\CalendarResource;
use App\Models\Calendar;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        $events = Calendar::all();

        return view('admin.calendar', compact('events'));
    }


    public function store(Request $request)
    {
        $event = new Calendar();
        $event->event = $request->input('event');
        $event->save();

        return redirect()->back();
    }
}
