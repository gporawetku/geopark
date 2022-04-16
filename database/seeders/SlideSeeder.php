<?php

namespace Database\Seeders;

use App\Models\Slide;
use Illuminate\Database\Seeder;

class SlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $sliders = Slide::factory()->count(10)->create();
        for ($i = 1; $i < 8; $i++){
            Slide::create([
                'name' => 'John Addison',
                'link' => null,
                'image' => 'images/slides/slide-'.$i.'.jpg',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem, minima.',
                'order' => $i,
                'creator_id' => 1,
            ]);
        }
    }
}

