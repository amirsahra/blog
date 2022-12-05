<?php

use App\Http\Controllers\Panel\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('home', [HomeController::class,'index']);
