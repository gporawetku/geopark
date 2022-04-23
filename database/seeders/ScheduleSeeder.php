<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Support\Carbon;
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
        $date    = Carbon::now();
        Schedule::insert([
            [
                "name" => "ส่งบทความวิชาการ",
                "description" => "1 - 18 เมษายน 2565",
                "start_date" => "2022-04-1 00:00:00",
                'end_date' => '2022-04-18 23:59:59',
                "creator_id" => 1,
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                'name' => 'ลงทะเบียน',
                'description' => '10 - 24 เมษายน 2565',
                'start_date' => '2022-04-10 00:00:00',
                'end_date' => '2022-04-24 23:59:59',
                'creator_id' => 1,
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                "name" => "ประกวดคลิป ภาพถ่าย เรียงความ",
                "description" => "20 - 25 เมษายน 2565",
                "start_date" => "2022-04-20 00:00:00",
                'end_date' => '2022-04-25 23:59:59',
                "creator_id" => 1,
                'created_at'    => $date,
                'updated_at'    => $date,
            ]
        ]);
    }
}
