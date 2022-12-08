<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthCodeController extends Controller
{
    public function codeVerifyForm()
    {
        return view('auth.code-verify');
    }
}
