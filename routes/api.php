<?php
//Сюда котроллеры!!
use App\Http\Controllers\Api\DeskController;
use App\Http\Controllers\Api\DeskListController;
use App\Http\Controllers\Api\CardController;
use App\Http\Controllers\Api\TaskController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resources([
    'desks' => DeskController::class,
    'desk-lists' => DeskListController::class,
    'cards' => CardController::class,
    'tasks' => TaskController::class
]);
