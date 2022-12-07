<?php

use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\PostController;
use Illuminate\Support\Facades\Route;
use Intervention\Image\Facades\Image;

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
    dd(php_ini_loaded_file());
    $avatar ='panel/avatars/default.png';
    $img = Image::make($avatar);
    $img->resize(400, 400, function ($const) {
        $const->aspectRatio();
    })->save($avatar);


});
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('post', PostController::class);
