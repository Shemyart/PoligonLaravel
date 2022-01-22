<?php

namespace Database\Seeders;

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
        $this->call(UsersTabldeSeeder::class);
        $this->call(BlogCategorsTableSeeder::class);
        factory(\App\Models\BlogPost::class, 100)->create();
    }
}
