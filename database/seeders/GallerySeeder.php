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
                "name" => "รูปภาพจากงานที่ 1",
                "description" => "รูปภาพจากงานที่ 1",
                "link" => "2022-04-25_100940.png",
                "type" => "1",
                "order" => null,
                "creator_id" => 1,
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                "name" => "รูปภาพจากงานที่ 2",
                "description" => "รูปภาพจากงานที่ 2",
                "link" => "2022-04-25_103646.png",
                "type" => "1",
                "order" => null,
                "creator_id" => 1,
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                "name" => "รูปภาพจากงานที่ 3",
                "description" => "รูปภาพจากงานที่ 3",
                "link" => "2022-04-25_110117.png",
                "type" => "1",
                "order" => null,
                "creator_id" => 1,
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                "name" => "รูปภาพจากงานที่ 4",
                "description" => "รูปภาพจากงานที่ 4",
                "link" => "2022-04-25_112520.png",
                "type" => "1",
                "order" => null,
                "creator_id" => 1,
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                "name" => "รูปภาพจากงานที่ 5",
                "description" => "รูปภาพจากงานที่ 5",
                "link" => "2022-04-25_115256.png",
                "type" => "1",
                "order" => null,
                "creator_id" => 1,
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                "name" => "รูปภาพจากงานที่ 6",
                "description" => "รูปภาพจากงานที่ 6",
                "link" => "2022-04-27_123303.png",
                "type" => "1",
                "order" => null,
                "creator_id" => 1,
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                "name" => "รูปภาพจากงานที่ 7",
                "description" => "รูปภาพจากงานที่ 7",
                "link" => "2022-04-27_123308.png",
                "type" => "1",
                "order" => null,
                "creator_id" => 1,
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                "name" => "รูปภาพจากงานที่ 8",
                "description" => "รูปภาพจากงานที่ 8",
                "link" => "2022-04-27_123312.png",
                "type" => "1",
                "order" => null,
                "creator_id" => 1,
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                "name" => "รูปภาพจากงานที่ 9",
                "description" => "รูปภาพจากงานที่ 9",
                "link" => "2022-04-27_123325.png",
                "type" => "1",
                "order" => null,
                "creator_id" => 1,
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                "name" => "รูปภาพจากงานที่ 10",
                "description" => "รูปภาพจากงานที่ 10",
                "link" => "2022-04-27_123351.png",
                "type" => "1",
                "order" => null,
                "creator_id" => 1,
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                "name" => "รูปภาพจากงานที่ 11",
                "description" => "รูปภาพจากงานที่ 11",
                "link" => "2022-04-27_123406.png",
                "type" => "1",
                "order" => null,
                "creator_id" => 1,
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                "name" => "รูปภาพจากงานที่ 12",
                "description" => "รูปภาพจากงานที่ 12",
                "link" => "2022-04-27_123440.png",
                "type" => "1",
                "order" => null,
                "creator_id" => 1,
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                "name" => "รูปภาพจากงานที่ 13",
                "description" => "รูปภาพจากงานที่ 13",
                "link" => "2022-04-27_123450.png",
                "type" => "1",
                "order" => null,
                "creator_id" => 1,
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                "name" => "รูปภาพจากงานที่ 14",
                "description" => "รูปภาพจากงานที่ 14",
                "link" => "2022-04-27_123455.png",
                "type" => "1",
                "order" => null,
                "creator_id" => 1,
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                "name" => "รูปภาพจากงานที่ 15",
                "description" => "รูปภาพจากงานที่ 15",
                "link" => "2022-04-27_123505.png",
                "type" => "1",
                "order" => null,
                "creator_id" => 1,
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                "name" => "รูปภาพจากงานที่ 16",
                "description" => "รูปภาพจากงานที่ 16",
                "link" => "2022-04-27_123538.png",
                "type" => "1",
                "order" => null,
                "creator_id" => 1,
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                "name" => "รูปภาพจากงานที่ 17",
                "description" => "รูปภาพจากงานที่ 17",
                "link" => "นายอนุชา สะสมทรัพย์.jpg",
                "type" => "1",
                "order" => null,
                "creator_id" => 1,
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                'name' => 'รูปภาพประกวดที่ 1',
                'description' => 'รูปภาพประกวดที่ 1',
                'link' => '1จักรกฤษณ์ ศุกร์ดี-ตาก.jpg',
                "type" => "2",
                "order" => null,
                'creator_id' => 1,
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                'name' => 'รูปภาพประกวดที่ 2',
                'description' => 'รูปภาพประกวดที่ 2',
                'link' => '2นายทินรัตน์ บุญเอก-โคราช.jpg',
                "type" => "2",
                "order" => null,
                'creator_id' => 1,
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                'name' => 'รูปภาพประกวดที่ 3',
                'description' => 'รูปภาพประกวดที่ 3',
                'link' => '3นางสาวนฤมล เต่าทอง-โคราช.jpg',
                "type" => "2",
                "order" => "1",
                'creator_id' => 1,
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                'name' => 'รูปภาพประกวดที่ 4',
                'description' => 'รูปภาพประกวดที่ 4',
                'link' => '4ศตวรรษ หาโชค-โคราช.jpg',
                "type" => "2",
                "order" => "2",
                'creator_id' => 1,
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                'name' => 'รูปภาพประกวดที่ 5',
                'description' => 'รูปภาพประกวดที่ 5',
                'link' => '5ศตวรรษ หาโชค-โคราช.jpg',
                "type" => "2",
                "order" => null,
                'creator_id' => 1,
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                'name' => 'รูปภาพประกวดที่ 6',
                'description' => 'รูปภาพประกวดที่ 6',
                'link' => '6นายอนุวัตน์  หมันเส็น - มารีณา โต๊ะมอง-สตูล.jpg',
                "type" => "2",
                "order" => "3",
                'creator_id' => 1,
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                'name' => 'รูปภาพประกวดที่ 7',
                'description' => 'รูปภาพประกวดที่ 7',
                'link' => '8. อุ้มสี วิเสโส.jpg',
                "type" => "2",
                "order" => null,
                'creator_id' => 1,
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                'name' => 'รูปภาพประกวดที่ 8',
                'description' => 'รูปภาพประกวดที่ 8',
                'link' => 'banner.jpg',
                "type" => "2",
                "order" => null,
                'creator_id' => 1,
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                "name" => "วิดีโอ 1",
                "description" => "วิดีโอ 1",
                "link" => "2qcrJZK0AVs",
                "type" => "3",
                "order" => null,
                "creator_id" => 1,
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                "name" => "วิดีโอ 2",
                "description" => "วิดีโอ 2",
                "link" => "gBwn7IGI8kI",
                "type" => "3",
                "order" => null,
                "creator_id" => 1,
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                "name" => "วิดีโอ 3",
                "description" => "วิดีโอ 3",
                "link" => "5ln-g1WBBF4",
                "type" => "3",
                "order" => null,
                "creator_id" => 1,
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                "name" => "วิดีโอ 4",
                "description" => "วิดีโอ 4",
                "link" => "_Pui9TZarc0",
                "type" => "3",
                "order" => null,
                "creator_id" => 1,
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                "name" => "วิดีโอ 5",
                "description" => "วิดีโอ 5",
                "link" => "zJZxcoLOFeA",
                "type" => "3",
                "order" => null,
                "creator_id" => 1,
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                "name" => "วิดีโอ 6",
                "description" => "วิดีโอ 6",
                "link" => "qny8TuFPs8g",
                "type" => "3",
                "order" => null,
                "creator_id" => 1,
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                "name" => "วิดีโอ 7",
                "description" => "วิดีโอ 7",
                "link" => "sHbde6zJYug",
                "type" => "3",
                "order" => null,
                "creator_id" => 1,
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
        ]);
    }
}
