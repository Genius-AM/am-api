<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Desk;
use App\Models\Task;

class WidgetController extends Controller
{
    public function index()
    {
       $projects = Desk::all()->count();
       $tasks = Task::all()->count();

        return view('admin.widgets', compact('projects', 'tasks'));
    }
}
