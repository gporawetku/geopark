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
            'description' => $this->faker->sentence,
            'creator_id'  => function () {
                return User::factory()->create()->id;
            },
        ];
    }
}
