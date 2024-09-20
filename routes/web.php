<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('register', [RegisterController::class, 'store'])->name('register');
Route::get('send-opt', [RegisterController::class, 'sendOpt'])->name('send.opt');
