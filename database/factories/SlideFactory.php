<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Slide;
use Illuminate\Database\Eloquent\Factories\Factory;

class SlideFactory extends Factory
{
    protected $model = Slide::class;

    public function definition()
    {
        $fakerFileName = $this->faker->image(public_path("images/slides"),1920 ,1080 );

        return
        [
            'name'        => $this->faker->word,
            'link'        => $this->faker->url,
            'description' => $this->faker->sentence,
            'order'       => $this->faker->unique()->numberBetween(1,10),
            // 'image'       => $this->faker->image(storage_path("app\public\slides"),1920 ,1080 ),
            'image'       => "images/slides/" . basename($fakerFileName),
            'creator_id'  => function () {
                return User::factory()->create()->id;
            },
        ];
    }
}
