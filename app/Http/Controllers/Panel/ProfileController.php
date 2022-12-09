<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\User;
use App\Rules\MinimumAge;
use App\Rules\Nationalcode;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('panel.profile.index', compact('user'));
    }

    public function edit()
    {
        $user = auth()->user();
        return view('panel.profile.edit', compact('user'));
    }

    public function update(ProfileRequest $request,User $user)
    {
        if ($user->id == auth()->id()) {
            $user->updateProfile($request, $user->id);
            return redirect()->back()->with('success',
                __('messages.update_method', ['name' => __('values.profile')]));
        }
        return redirect()->back()->with('error', __('messages.unauthorized'));

    }
}
