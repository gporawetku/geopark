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
        // Blog::factory()
        //     ->count(2)
        //     ->create();
        Blog::insert([
            [
                'name' => 'ก้าวแรก...อุทยานธรณีไทยร่วมใจไปด้วยกัน',
                'description' => 'งานสัมมนาทางวิชาการ เครือข่ายอุทยานธรณีประเทศไทย #1',
                'content' => 'images/blogs/register-2.jpg',
                'page_menu' => 'register',
                'creator_id' => 1,
            ]
        ]);
    }
}
