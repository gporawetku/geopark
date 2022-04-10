<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blog::factory()
            ->count(2)
            ->create();

        Blog::create([
            'name' => 'John Addison',
            'description' => '88992299112',
            'content' => 'Register',
            'page_menu' => 'register',
            'creator_id' => 1,
        ]);
    }
}
