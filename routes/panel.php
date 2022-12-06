<?php

use App\Http\Controllers\Panel\HomeController;
use App\Http\Controllers\Panel\PostController;
use Illuminate\Support\Facades\Route;


Route::get('home', [HomeController::class,'index']);
Route::resource('post', PostController::class);
