<?php

namespace Database\Seeders;

use Config;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    private $adminPermissions;
    private $memberPermissions;

    public function __construct()
    {
        $this->adminPermissions = Config::get('dornicasettings.permissions.admin');
        $this->memberPermissions = Config::get('dornicasettings.permissions.member');
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
        foreach ($this->adminPermissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        Permission::create(['name' => 'assign_admin']);
    }

    public function syncPermissionsForDefaultRoles()
    {
        $this->syncPermissionsForSuperAdmin();
        $this->syncPermissionsForAdmin();
        $this->syncPermissionsForMember();
    }

    private function syncPermissionsForSuperAdmin()
    {
        $superAdminRole = Role::where('name', 'super_admin')->first();
        $superAdminRole->syncPermissions($this->adminPermissions);
        $superAdminRole->givePermissionTo('assign_admin');
    }

    private function syncPermissionsForAdmin()
    {
        $adminRole = Role::where('name', 'admin')->first();
        $adminRole->syncPermissions($this->adminPermissions);
    }

    private function syncPermissionsForMember()
    {
        $memberRole = Role::where('name', 'member')->first();
        $memberRole->syncPermissions($this->memberPermissions);

    }
}
