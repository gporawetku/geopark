<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schedule::insert([
            [
                'name' => 'วันที่ 24 เมษายน 2565 การประชุมคณะอนุกรรมการอุทยานธรณีแห่งชาติ',
                'description' => 'การประชุมคณะอนุกรรมการอุทยานธรณีแห่งชาติ',
                'plan_date_time' => '2022-04-24 09:30:00',
                'creator_id' => 1,
            ],
            [
                "name" => "วันที่ 25 เมษายน 2565 พิธีเปิดและบรรยายพิเศษ/April 25, 2022 Opening Ceremony & Keynote speakers Session",
                "description" => "พิธีเปิดและบรรยายพิเศษ/April 25, 2022 Opening Ceremony & Keynote speakers Session",
                "plan_date_time" => "2022-04-25 08:15:00",
                "creator_id" => 1,
            ],
            [
                "name" => "วันที่ 25 เมษายน 2565/April 25, 2022  นำเสนอ/แลกเปลี่ยนเรียนรู้ทางวิชาการ/Oral presentation",
                "description" => "นำเสนอ/แลกเปลี่ยนเรียนรู้ทางวิชาการ/Oral presentation",
                "plan_date_time" => "2022-04-25 13:00:00",
                "creator_id" => 1,
            ],
            [
                "name" => "วันที่ 26 เมษายน 2565/April 26, 2022 นำเสนอ/แลกเปลี่ยนเรียนรู้ทางวิชาการ/ Oral presentation",
                "description" => "นำเสนอ/แลกเปลี่ยนเรียนรู้ทางวิชาการ/Oral presentation",
                "plan_date_time" => "2022-04-25 08:15:00",
                "creator_id" => 1,
            ]
        ]);
    }
}
