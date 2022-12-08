<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\PersianCaptcha;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use PersianCaptcha;

    public function loginForm()
    {
        $captcha = $this->generateCaptcha();
        return view('auth.login', compact('captcha'));
    }

    public function login(Request $loginRequest)
    {
        $loginRequest->validate([
            'username' => ['required','exists:users,username'],
            're_captcha' => ['required', new \App\Rules\PersianCaptcha($loginRequest->input('captcha'))]

        ]);
        if (Auth::attempt($loginRequest->only(['username','password']))) {
            return redirect()->route('home')
                ->withSuccess('You have Successfully loggedin');
        }

        return redirect()->back()->with('error','Oppes! You have entered invalid credentials');
    }
}
