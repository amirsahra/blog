<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    }

    public function insertDefaultPermission()
    {
        $permissions = [
            'delete post', 'delete_cat', 'delete_comment', 'delete_province', 'delete_city', 'delete_user',
            'update post', 'update_cat', 'update_comment', 'update_province', 'update_city', 'update_user',
            'read post', 'read cat', 'read comment', 'read province', 'read city', 'read user',
            'create post', 'create cat', 'create comment', 'create province', 'create city', 'create user',
            'assign admin',
        ];
    }
}
