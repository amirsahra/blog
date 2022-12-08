<?php

use App\Http\Controllers\Auth\AuthCodeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\PostController;
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

Route::get('/test', function () {

    dd(Config::get('dornicasettings.image_path.' . 'avatar'));
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'loginForm'])->name('form.login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/code-verify', [AuthCodeController::class, 'codeVerifyForm'])->name('auth.code.verify');
Route::resource('post', PostController::class);
