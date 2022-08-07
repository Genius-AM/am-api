<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CardResource;
use App\Models\Card;
use App\Http\Requests\CardStoreRequest;


class CardController extends Controller
{

    public function index()
    {
        //
    }


    public function store(CardStoreRequest $request)
    {
        $new_card = Card::create($request->validated());

        return new CardResource($new_card);
    }


    public function show(Card $card)
    {
        return new CardResource($card);
    }


    public function update(CardStoreRequest $request, Card $card)
    {
        $card->update($request->validated());

        return new CardResource($card);
    }


    public function destroy(Card $card)
    {
        $card->delete();

        return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
