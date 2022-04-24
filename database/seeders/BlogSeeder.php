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
                'name'          => 'TGN Photo Contest 6: ผลงานของ นายอนุวัตน์  หมันเส็น "ขุมทรัพย์ทางทะเล ที่นี่ปราสาทหินพันยอด"',
                'description'   => 'ขอเชิญ ร่วมกด 1 ไลค์ 1 แชร์......ให้กับภาพถ่ายที่ท่านชื่นชอบในแนวคิดการประกวดภาพถ่าย "มุมที่ฉันอยากให้ใครๆ เห็น"',
                'content'       => 'นอกจากจะเป็นสถานที่ที่เป็นแหล่งเรียนรู้ทางธรณีแล้ว นักท่องเที่ยวสามารถทำกิจกรรมล่องเรือชมความงามของทะเล ภูเขา สนุกสนานตลอดเส้นทาง แล้วมาชมความแปลกตาของภูเขาที่ไม่เหมือนใคร ที่ปลายสุดของภูเขามียอดเล็กๆมากกว่าพันยอดให้นักท่องเที่ยวได้ชื่นชม  ได้พายเรือลอดซุ้มหินไปชมความงามในช่องภูเขา ...... ปราสาทหินพันยอด อุทยานธรณีโลก  จังหวัดสตูล',
                'image'         => 'images/blogs/blog-5.jpg',
                'creator_id'    => 1,
                'created_at'    => Carbon::now()->subDays(3),
                'updated_at'    => Carbon::now()->subDays(3),
            ],
            [
                'name'          => 'TGN Photo Contest 7: ผลงานของ นางสาว ธีรมา วิเสโส "เดียวดายในสายลม"',
                'description'   => 'ขอเชิญ ร่วมกด 1 ไลค์ 1 แชร์......ให้กับภาพถ่ายที่ท่านชื่นชอบในแนวคิดการประกวดภาพถ่าย "มุมที่ฉันอยากให้ใครๆ เห็น"',
                'content'       => 'แม้ว่าร่างกายจะเหนื่อยอ่อนล้า แต่พอตะวันตกดิน สายลมและความมึดจะปัดเป่าให้กายเหนื่อยพร้อมยิ้มรับกับวันใหม่ในเช้าวันรุ่งขึ้น...... เขื่อนลำตะคองบนเขายายเที่ยง/ อุทยานธรณีโคราชจังหวัดนครราชสีมา',
                'image'         => 'images/blogs/blog-4.jpg',
                'creator_id'    => 1,
                'created_at'    => Carbon::now()->subDays(3),
                'updated_at'    => Carbon::now()->subDays(3),
            ],
            [
                'name'          => 'ก้าวแรก...อุทยานธรณีไทยร่วมใจไปด้วยกัน',
                'description'   => 'The 1st Thailand Geoparks Network Symposium',
                'content'       => 'อุทยานธรณีโลกสตูลและกรมทรัพยากรธรณี   ขอเชิญทุกท่านร่วมการสัมมนาทางวิชาการเครือข่ายอุทยานธรณีประเทศไทย ครั้งที่ 1 ผ่าน zoom webinar และรับชมได้ทาง Geoparks Thailand',
                'image'         => 'images/blogs/blog-3.jpg',
                'creator_id'    => 1,
                'created_at'    => Carbon::now()->subDays(2),
                'updated_at'    => Carbon::now()->subDays(2),
            ],
            [
                'name'          => 'นับถอยหลังอีก 2 วันเท่านั้น เตรียมพบกับ งานสัมมนา Online ระดับนานาชาติ งานสัมนาทางวิชาการเครือข่ายอุทยานธรณีประเทศไทยครั้งที่ 1',
                'description'   => 'The 1st Thailand Geoparks Network Symposium',
                'content'       => 'กรมทรัพยากรธณีและอุทยานธรณีโลกสตูล ขอเชิญ... เครือข่ายอุทยานธรณีในประเทศไทยทุกภาคส่วนเข้าร่วมการประชุมสัมมนาทางวิชาการเครือข่ายอุทยานธรณีประเทศไทย ครั้งที่ 1 (The 1st Thailand Geoparks Network Symposium)',
                'image'         => 'images/blogs/blog-2.jpg',
                'creator_id'    => 1,
                'created_at'    => Carbon::now()->subDays(1),
                'updated_at'    => Carbon::now()->subDays(1),
            ],
            [
                'name'          => 'การสัมมนาทางวิชาการเครือข่ายอุทยานธรณีประเทศไทย (ออนไลน์)',
                'description'   => 'The 1st Thailand Geoparks Network Symposium',
                'content'       => 'กรมทรัพยากรธณีและอุทยานธรณีโลกสตูล ขอเชิญเครือข่ายอุทยานธรณีในประเทศไทยทุกภาคส่วนเข้าร่วมการประชุมสัมมนาทางวิชาการเครือข่ายอุทยานธรณีประเทศไทย ครั้งที่ 1 (The 1st Thailand Geoparks Network Symposium)',
                'image'         => 'images/blogs/blog-1.jpg',
                'creator_id'    => 1,
                'created_at'    => $dateNow,
                'updated_at'    => $dateNow,
            ]
        ]);
    }
}
