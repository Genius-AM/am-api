<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeskListStoreRequest;
use App\Http\Requests\DeskListUpdateRequest;
use App\Http\Resources\DeskListResource;
use App\Models\DeskList;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DeskListController extends Controller
{

    public function index(Request $request)
    {
        $request->validate([
            'desk_id' => 'required|integer|exists:desks,id'
        ]);

        return DeskListResource::collection(
            DeskList::orderBy('created_at', 'desc')
                ->where('desk_id', $request->desk_id)
                ->get()
        );
    }


    public function store(DeskListStoreRequest $request)
    {
        $created_desk_list = DeskList::create($request->validated());

        return new DeskListResource($created_desk_list);
    }


    public function show($id)
    {
        //
    }


    public function update(DeskListUpdateRequest $request, DeskList $deskList)
    {
        $deskList->update($request->validated());

        return new DeskListResource($deskList);
    }


    public function destroy(DeskList $deskList)
    {
        $deskList->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
