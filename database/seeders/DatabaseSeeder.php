<?php

namespace Database\Seeders;
;
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
        \App\Models\BlogPost::factory(100)->create();
    }


}
