<?php

use App\Http\Controllers\AuthContoller;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
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

Route::get('/', [IndexController::class, 'index']);
Route::get('/hello', [IndexController::class, 'show']);

Route::resource('listing', ListingController::class);

Route::get('login',[AuthContoller::class,'create'])->name('login');

Route::post('login',[AuthContoller::class,'store'])->name('login.store');

Route::delete('logout',[AuthContoller::class,'destroy'])->name('logout');


