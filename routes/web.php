<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/', '/index')->middleware('auth');


Route::prefix('user')->group(function (){
    Route::resource('personal', UserController::class);
});

Route::group(['middleware' => ['role:admin']], function (){
    Route::get('/admin-panel', [AdminController::class , 'index']);
    Route::get('/all-users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users');
});


// Не удалять т.к это используется для построения роутов SPA приложения
Route::get('/{any}', [App\Http\Controllers\HomeController::class, 'index'])->where('any', '.*');


