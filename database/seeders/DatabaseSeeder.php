<?php

namespace Database\Seeders;

use App\Models\Article;
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
        \App\Models\Article::factory(20)->create();
        \App\Models\Category::factory(5)->create();
        \App\Models\Comment::factory(40)->create();
        \App\Models\User::factory()->create([
            'name'=>'User 1',
            'email'=>'user1@gmail.com',
        ]);
        \App\Models\User::factory()->create([
            'name'=>'User 2',
            'email'=>'user2@gmail.com',
        ]);
        \App\Models\User::factory()->create([
            'name'=>'User 3',
            'email'=>'user3@gmail.com',
        ]);
    }
}
