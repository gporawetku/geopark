<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\GeoparkImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class GeoparkImageFactory extends Factory
{
    protected $model = GeoparkImage::class;

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
