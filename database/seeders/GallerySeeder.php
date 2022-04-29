<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date    = Carbon::now();
        Gallery::insert([
            [
                "name" => "รูปภาพจากที่ 1",
                "description" => "รูปภาพที่ 1",
                "link" => "1.jpg",
                "type" => "1",
                "creator_id" => 1,
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                'name' => 'รูปภาพที่ 2',
                'description' => 'รูปภาพที่ 2',
                'link' => '1.jpg',
                "type" => "2",
                'creator_id' => 1,
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                "name" => "วิดีโอ 3",
                "description" => "วิดีโอ 3",
                "link" => "cX58ulOVo2g",
                "type" => "3",
                "creator_id" => 1,
                'created_at'    => $date,
                'updated_at'    => $date,
            ]
        ]);
    }
}
