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

    $arr=['name'=>'amir','age'=>null];
    dd(array_filter($arr));
});

Route::group(['middleware' => 'auth.code'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/login', [LoginController::class, 'loginForm'])->name('form.login');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::resource('post', PostController::class);
});


Route::group(['prefix' => 'auth-code'], function () {
    Route::get('/check', [AuthCodeController::class, 'checkForm'])->name('auth.code.check.form');
    Route::post('/check', [AuthCodeController::class, 'check'])->name('auth.code.check');
    Route::get('/resend', [AuthCodeController::class, 'resendForm'])->name('auth.code.resend.form');
    Route::post('/resend', [AuthCodeController::class, 'resend'])->name('auth.code.resend');
});

