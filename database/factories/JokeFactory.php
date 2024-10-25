<?php

namespace Database\Factories;

use App\Models\Joke;
use Illuminate\Database\Eloquent\Factories\Factory;

class JokeFactory extends Factory
{
    protected $model = Joke::class;

    public function definition()
    {
        return [
            'type' => $this->faker->sentence(),
            'setup' => $this->faker->sentence(),
            'punchline' => $this->faker->sentence(),
        ];
    }
}
