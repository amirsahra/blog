<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CodeAuthCodeCheckRequest;
use App\Http\Requests\SendAuthCodeRequest;
use App\Models\User;
use App\Traits\HasAuthCode;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;

class AuthCodeController extends Controller
{
    use HasAuthCode;

    public function checkForm()
    {
        return view('auth.code-verify');
    }

    public function check(CodeAuthCodeCheckRequest $request)
    {
        $user = User::where('email',$request->email)->firstOrFail();
        if ($user->authentication_code == $request->auth_code){
            $user->update(['code_verified_at'=>Carbon::now()]);
            return redirect()->route('panel.home')->with('success','The authentication code has been successfully verified.');
        }else
            return redirect()->back()->with('error','The information sent is incorrect');
    }

    public function resendForm()
    {
        return view('auth.resend-code-verify');
    }

    public function resend(SendAuthCodeRequest $request): RedirectResponse
    {
        $user = User::where('email', $request->email)->firstOrFail();
        $authenticationCode = rand(9999, 99999);
        $user->update(['authentication_code' => $authenticationCode]);
        $this->sendAuthCodeToMail($user->email, $authenticationCode);
        return redirect()->back()->with('success','The authentication code has been successfully sent to your email');
    }
}
