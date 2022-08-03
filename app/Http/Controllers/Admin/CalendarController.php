<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class CalendarController extends Controller
{
    public function index(): view
    {
        return view('admin.calendar');
    }
}
