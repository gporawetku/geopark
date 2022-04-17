<?php

namespace Database\Seeders;

use App\Models\Blog;
use Carbon\Carbon;
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

        $dateNow    = Carbon::now();
        Blog::insert([
            [
                'name'          => 'ก้าวแรก...อุทยานธรณีไทยร่วมใจไปด้วยกัน',
                'description'   => 'งานสัมมนาทางวิชาการ เครือข่ายอุทยานธรณีประเทศไทย #1',
                'content'       => 'งานสัมมนาทางวิชาการ เครือข่ายอุทยานธรณีประเทศไทย #1',
                'image'         => 'images/blogs/slide-1.jpg',
                'creator_id'    => 1,
                'created_at'    => $dateNow,
                'updated_at'    => $dateNow,
            ],
            [
                'name'          => 'ก้าวแรก...อุทยานธรณีไทยร่วมใจไปด้วยกัน',
                'description'   => 'งานสัมมนาทางวิชาการ เครือข่ายอุทยานธรณีประเทศไทย #2',
                'content'       => 'งานสัมมนาทางวิชาการ เครือข่ายอุทยานธรณีประเทศไทย #2',
                'image'         => 'images/blogs/slide-2.jpg',
                'creator_id'    => 1,
                'created_at'    => $dateNow,
                'updated_at'    => $dateNow,
            ],
            [
                'name'          => 'ก้าวแรก...อุทยานธรณีไทยร่วมใจไปด้วยกัน',
                'description'   => 'งานสัมมนาทางวิชาการ เครือข่ายอุทยานธรณีประเทศไทย #3',
                'content'       => 'งานสัมมนาทางวิชาการ เครือข่ายอุทยานธรณีประเทศไทย #3',
                'image'         => 'images/blogs/slide-3.jpg',
                'creator_id'    => 1,
                'created_at'    => $dateNow,
                'updated_at'    => $dateNow,
            ],
            [
                'name'          => 'ก้าวแรก...อุทยานธรณีไทยร่วมใจไปด้วยกัน',
                'description'   => 'งานสัมมนาทางวิชาการ เครือข่ายอุทยานธรณีประเทศไทย #4',
                'content'       => 'งานสัมมนาทางวิชาการ เครือข่ายอุทยานธรณีประเทศไทย #4',
                'image'         => null,
                'creator_id'    => 1,
                'created_at'    => $dateNow,
                'updated_at'    => $dateNow,
            ]
        ]);
    }
}
