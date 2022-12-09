<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Middleware\SuperAdmin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AccessLevelController extends Controller
{
    public function __construct()
    {
        $this->middleware(SuperAdmin::class);
    }

    public function accessLevel(User $user)
    {
        $data = [
            'user' => $user,
            'roles' => Role::all(),
            'permissions' => Permission::all(),
        ];
        return view('panel.user.access', compact('data'));

    }

    public function assignRole(Request $request, User $user)
    {
        $roles = array_keys($request->only(['super_admin', 'admin', 'member']));
        if ($request->has('remove'))
            $user->syncRoles([]);
        else
            $user->syncRoles([$roles]);

        return redirect()->back()->with('success', 'Assign role successfully');
    }

    public function assignPermission(Request $request, User $user)
    {
        $permissions = array_keys($request->only(Config::get('dornicasettings.permissions.admin')));
        $user->syncPermissions([$permissions]);
        return redirect()->back()->with('success', 'Assign permission successfully');
    }
}
