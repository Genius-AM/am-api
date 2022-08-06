<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class CalendarController extends Controller
{
    public function index()
    {
        return view('admin.calendar');
    }
}
