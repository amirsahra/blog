<?php

use App\Http\Controllers\Panel\HomeController;
use App\Http\Controllers\Panel\PostController;
use App\Http\Controllers\Panel\ProfileController;
use App\Http\Controllers\Panel\UserController;
use Illuminate\Support\Facades\Route;


Route::get('home', [HomeController::class,'index'])->name('home');
Route::get('profile', [ProfileController::class,'index'])->name('profile.index');
Route::get('profile/edit', [ProfileController::class,'edit'])->name('profile.edit');
Route::post('profile/update/{id}', [ProfileController::class,'update'])->name('profile.update');
Route::resource('post', PostController::class);

Route::group(['prefix'=>'users'],function (){
    Route::get('/', [UserController::class,'index'])->name('users.index');
    Route::get('show/{user}', [UserController::class,'edit'])->name('users.show');
    Route::get('edit/{user}', [UserController::class,'edit'])->name('users.edit');
    Route::post('update/{user}', [UserController::class,'update'])->name('users.update');
    Route::get('access/{user}', [UserController::class,'accessLevel'])->name('users.access');
    Route::post('access/{user}', [UserController::class,'accessLevel'])->name('users.access.update');
});

