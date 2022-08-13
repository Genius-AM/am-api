<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        $id = Auth::id();
        $user = User::findOrFail($id);

        return view('personal', ['user' => $user]);
    }


    public function create(Request $request, User $user)
    {

    }


    public function store(Request $request)
    {

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, User $user)
    {
        $id = Auth::id();
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');

       // $user->avatar = $request->file('image')->store('avatar', 'public');
        $user->update();

        return redirect()->back();
    }


    public function destroy($id)
    {
        //
    }

    public function uploadAvatar(Request $request, User $user)
    {
        $id = Auth::id();
        $user = User::findOrFail($id);
        $user->avatar = $request->file('image')->store('avatar', 'public');

        $user->save();

        return redirect()->back();
    }
}
