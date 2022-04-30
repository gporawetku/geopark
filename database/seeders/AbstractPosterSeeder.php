<?php

namespace Database\Seeders;

use App\Models\AbstractPoster;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class AbstractPosterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date    = Carbon::now();
        AbstractPoster::insert([
            [
                'name'          => 'ก้าวแรก...อุทยานธรณีไทยร่วมใจไปด้วยกัน',
                'description'   => '20 เม.ย. 2022',
                'image'         => 'images/abstracts/abstract-1.jpg',
                'author'        => 'บทความวิชาการ',
                'link'          => 'https://drive.google.com/drive/folders/1I3MewfoZKrvatJhCjAnfyJONr22lo5tt?usp=sharing',
                'creator_id'    => 1,
                'created_at'    => $date,
                'updated_at'    => $date,
            ]
        ]);
    }
}
