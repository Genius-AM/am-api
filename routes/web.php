<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\WidgetController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['role:admin']], function (){
    Route::get('/admin-panel', [AdminController::class , 'index'])->name('admin-panel');
    Route::get('/all-users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users');
    Route::get('/widgets', [WidgetController::class, 'index'])->name('admin.widget');
    Route::get('admin/desks', [AdminController::class, 'show'])->name('admin.desks');
    Route::get('/calendar', [CalendarController::class, 'index'])->name('admin.calendar');
});

Route::prefix('user')->group(function (){
    Route::resource('personal', UserController::class);
});



// Не удалять т.к это используется для построения роутов SPA приложения
Route::get('/{any}', [App\Http\Controllers\HomeController::class, 'index'])->where('any', '.*');


