<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();

    Route::get('/{any}', [App\Http\Controllers\HomeController::class, 'index'])->where('any', '.*');



    Route::middleware(['role:admin'])->prefix('admin_panel')->group( function ()
    {
        Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('homeAdmin');

        Route::resource('categories',\App\Http\Controllers\Admin\CategoriesController::class);
        Route::resource('product', \App\Http\Controllers\Admin\ProductController::class);

    });

