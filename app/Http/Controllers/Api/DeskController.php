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
use Illuminate\Support\Facades\Session;

class DeskController extends Controller
{
    const MIN_INT_COD = 111111;
    const MAX_ITN_COD = 999999;

    public function Withdraw(Request $request)
    {
        $desks = Desk::all();

        $mes = rand(self::MIN_INT_COD, self::MAX_ITN_COD);
        $session = Session::put('SmsCode', $mes);

        foreach ($desks as $desk){
            Log::info('Заход на страницу и прогрузка всех досок', ['name' => $desk->name]);
        }

        return view('desks.desk', compact('desks', 'mes'));
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
        $user_id = Auth::id();

            $desk->user_id = $user_id;
            $desk->name = $request->input('name');

            $desk->save();


        return redirect()->back();
    }


}
