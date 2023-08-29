<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->text,
            'location' => $this->faker->word,
            'start_date' => $this->faker->dateTime,
            'end_date' => $this->faker->dateTime,
            'food' => $this->faker->boolean,
            'price' => $this->faker->randomFloat,
            'max_participants' => $this->faker->randomNumber,
            'min_participants' => $this->faker->randomNumber,
            'image' => $this->faker->word,
        ];
    }
}
