<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Middleware\SuperAdmin;
use App\Http\Requests\ProfileRequest;
use App\Models\User;
use App\Traits\HasAccessLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    use HasAccessLevel;

    public function __construct()
    {
        $this->middleware(SuperAdmin::class)->only(['index']);
    }

    public function index()
    {
        $users = User::paginate(Config::get('dornicasettings.paginate.user'));
        return view('panel.user.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('panel.user.show', compact('user'));

    }

    public function edit(User $user)
    {
        return view('panel.user.edit', compact('user'));
    }

    public function update(ProfileRequest $request,User $user)
    {
        if (auth()->user()->can('update user')){
            $user->updateProfile($request, $user->id);
            return redirect()->back()->with('success',
                __('messages.update_method', ['name' => __('values.profile')]));

        }
        return redirect()->back()->with('error', __('messages.unauthorized'));
    }

    public function accessLevel(User $user)
    {
        $data=[
            'user'=>$user,
            'roles'=>Role::all(),
            'permissions'=>Permission::all(),
        ];
        return view('panel.user.access', compact('data'));

    }
}
