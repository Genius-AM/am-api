<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeskStoreRequest;
use App\Http\Resources\DeskResource;
use App\Models\Desk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DeskController extends Controller
{
    public function Widg()
    {
        $desks = Desk::all();

        return view('desks.desk', compact('desks'));
    }

    public function index()
    {
        return DeskResource::collection(
            Desk::orderBy('created_at', 'desc')->get());
    }


    public function store(DeskStoreRequest $request)
    {

        $new_desk = new Desk();

        $new_desk->name = $request->input('desk');
        $new_desk->user_id = $request->user()->id;
        $new_desk->save();



        return redirect()->back();
    }


    public function show(Desk $desk)
    {
        return new DeskResource($desk);
    }





    public function update(DeskStoreRequest $request, Desk $desk)
    {
        $desk->update($request->validated());

        return new DeskResource($desk);
    }


    public function destroy( Request $request, Desk $desk)
    {
        $desk->delete($request->input('del'));

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function desk(Desk $desk, Request $request)
    {
        $desk->user_id = $request->user()->id;
        $desk->name = $request->input('name');
        //dd($desk);

        $desk->save();

        return redirect()->back();
    }
}
