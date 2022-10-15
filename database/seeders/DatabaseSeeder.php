<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(BlogCategoriesTableSeeder::class);
        //factory(\App\Models\BlogPost::class, 100)->create();
       // \App\Models\User::factory(10)->create();   было только это
        \App\Models\BlogPost::factory()->count(100)->create();
    }
}
