<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Schedule;
use App\Models\Slide;
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
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        Blog::factory()->count(10)->create();
        Slide::factory()->count(10)->create();
        Schedule::factory()->count(10)->create();
    }
}
