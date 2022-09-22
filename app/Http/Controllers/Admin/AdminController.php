<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Desk;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        $users = User::all()->count();
        $desks = Desk::all()->count();
        $oldTime = date('Y-m-d', mktime(0, 0, 0, date('m') -1, 1));
        $time = date('Y-m-d');
        $tasks = Task::all()->value('is_done');


        return view('admin.home.index', compact('users', 'desks', 'oldTime', 'time', 'tasks'));
    }


    public function AmountUser()
    {
        $users = User::all()->count();

        return view('admin.home.index', ['users' => $users]);
    }
}
