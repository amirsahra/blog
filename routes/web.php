<?php

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

    //Declare the string data
    $strdata = "Learn PHP programming from the basic ";

    //Count and print the total number of words in the string data

    $count = str_word_count($strdata) / 4;
    //dd(ceil($count));
    dd(($count));
});
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('post', PostController::class);
