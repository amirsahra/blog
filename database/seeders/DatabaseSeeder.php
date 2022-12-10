<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ProvinceSeeder::class,
            CitySeeder::class,
            UserSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
        ]);

        User::factory(100)->create();
        Category::factory(20)->create();
        Post::factory(100)->create();
        Comment::factory(500)->create();

    }
}
