<?php

use App\Http\Controllers\FromController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create',[FromController::class,'create']);
Route::post('store',[FromController::class,'store'])->name('store.data');
Route::get('send-otp',[FromController::class,'sendOtp'])->name('send-otp');
