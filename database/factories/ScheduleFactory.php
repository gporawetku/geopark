<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Schedule;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScheduleFactory extends Factory
{
    protected $model = Schedule::class;

    public function definition()
    {
        return [
            'name'        => $this->faker->word,
            'description' => $this->faker->sentence,
            'start_date' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
            'creator_id'  => function () {
                return User::factory()->create()->id;
            },
        ];
    }
}
