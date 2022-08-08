<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        return view('admin.calendar');
    }


    public function store(Request $request, array $data)
    {
        $event = Calendar::create([
            'event' => $data['event'],
        ]);
        return $event;
    }
}
