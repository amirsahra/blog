<?php

use App\Http\Controllers\Panel\HomeController;
use App\Http\Controllers\Panel\PostController;
use App\Http\Controllers\Panel\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('home', [HomeController::class,'index']);
Route::get('profile', [ProfileController::class,'index'])->name('profile.index');
Route::get('profile/edit', [ProfileController::class,'edit'])->name('profile.edit');
Route::post('profile/update/{id}', [ProfileController::class,'update'])->name('profile.update');
Route::resource('post', PostController::class);
