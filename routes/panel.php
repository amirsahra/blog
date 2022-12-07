<?php

use App\Http\Controllers\Panel\HomeController;
use App\Http\Controllers\Panel\PostController;
use App\Http\Controllers\Panel\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('home', [HomeController::class,'index']);
Route::get('profile', [ProfileController::class,'index'])->name('index');
Route::resource('post', PostController::class);
