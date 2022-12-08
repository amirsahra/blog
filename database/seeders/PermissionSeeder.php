<?php

namespace Database\Seeders;

use Config;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    private $permissions;

    public function __construct()
    {
        $this->permissions = Config::get('dornicasettings.permissions');
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertDefaultPermission();
        $this->syncPermissionsForDefaultRoles();
    }

    public function insertDefaultPermission()
    {
        foreach ($this->permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        Permission::create(['name' => 'assign admin']);
    }

    public function syncPermissionsForDefaultRoles()
    {
        $this->syncPermissionsForSuperAdmin();
        $this->syncPermissionsForAdmin();
        $this->syncPermissionsForMember();
    }

    private function syncPermissionsForSuperAdmin()
    {
        $superAdminRole =Role::where('name','super admin')->first();
        $superAdminRole->syncPermissions($this->permissions);
        $superAdminRole->givePermissionTo('assign admin');
    }

    private function syncPermissionsForAdmin()
    {
        $adminRole =Role::where('name','admin')->first();
        $adminRole->syncPermissions($this->permissions);
    }

    private function syncPermissionsForMember()
    {

    }
}
