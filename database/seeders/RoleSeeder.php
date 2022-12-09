<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertDefaultRole();
        $this->assignDefaultRole();
    }

    public function insertDefaultRole()
    {
        Role::create(['name' => 'super_admin']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'member']);
    }

    public function assignDefaultRole()
    {
        $user = User::where('username','admin')->firstOrFail();
        $user->assignRole('super_admin');

    }

}
