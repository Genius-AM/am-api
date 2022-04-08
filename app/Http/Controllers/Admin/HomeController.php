<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $productsts_count = Post::all()->count();
        return view('admin.home.index',[
            'productsts_count' => $productsts_count,

        ]);

        $users_count = Users::all()->count();
        return view('admin.home.index', [
            'users_count' => $users_count,
        ]);
    }
}
