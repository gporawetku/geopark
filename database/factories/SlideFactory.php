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
        return [
            'name'        => $this->faker->word,
            'link'        => $this->faker->url,
            'description' => $this->faker->sentence,
            'order'        => $this->faker->unique()->numberBetween(1,10),
            'creator_id'  => function () {
                return User::factory()->create()->id;
            },
        ];
    }
}
