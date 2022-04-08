<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products_count = Post::all()->count();
        return view('admin.home.index',[
            'post_count' => $products_count

        ]);
    }
}
