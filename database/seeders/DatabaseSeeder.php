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
        User::factory(100)->create();
        Category::factory(20)->create();
        Post::factory(100)->create();
        Comment::factory(500)->create();

        $this->call(ProvinceSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(UserSeeder::class);
    }
}
