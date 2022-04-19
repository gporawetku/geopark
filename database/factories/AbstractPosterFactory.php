<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\AbstractPoster;
use Illuminate\Database\Eloquent\Factories\Factory;

class AbstractPosterFactory extends Factory
{
    protected $model = AbstractPoster::class;

    public function definition()
    {
        return [
            'title'       => $this->faker->word,
            'description' => $this->faker->sentence,
            'creator_id'  => function () {
                return User::factory()->create()->id;
            },
        ];
    }
}
