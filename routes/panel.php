<?php

use App\Http\Controllers\Panel\AccessLevelController;
use App\Http\Controllers\Panel\CategoryController;
use App\Http\Controllers\Panel\CityController;
use App\Http\Controllers\Panel\HomeController;
use App\Http\Controllers\Panel\LogsActivityController;
use App\Http\Controllers\Panel\PostController;
use App\Http\Controllers\Panel\ProfileController;
use App\Http\Controllers\Panel\ProvinceController;
use App\Http\Controllers\Panel\ReportController;
use App\Http\Controllers\Panel\UserController;
use Illuminate\Support\Facades\Route;


Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('logs', [LogsActivityController::class, 'index'])->name('logs.index');
Route::get('profile/edit/{user}', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('profile/update/{user}', [ProfileController::class, 'update'])->name('profile.update');
Route::resource('post', PostController::class);
Route::resource('category', CategoryController::class);

Route::group(['prefix' => 'region', 'as' => 'region.'], function () {
    Route::get('/', [ProvinceController::class, 'index']);
    Route::resource('province', ProvinceController::class);
    Route::resource('city', CityController::class);
});

Route::group(['prefix' => 'users','as'=>'users.'], function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('show/{user}', [UserController::class, 'show'])->name('show');
    Route::get('edit/{user}', [UserController::class, 'edit'])->name('edit');
    Route::get('destroy/{user}', [UserController::class, 'destroy'])->name('destroy');
    Route::post('update/{user}', [UserController::class, 'update'])->name('update');
    Route::get('access/{user}', [AccessLevelController::class, 'accessLevel'])->name('access');
    Route::post('assign-role/{user}', [AccessLevelController::class, 'assignRole'])->name('assign.role');
    Route::post('assign-permission/{user}', [AccessLevelController::class, 'assignPermission'])->name('assign.permission');

    Route::get('report/', [ReportController::class, 'index'])->name('report.index');
    Route::get('report/chart', [ReportController::class, 'chart'])->name('report.chart');
});

