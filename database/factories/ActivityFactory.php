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
        //put start date either a bit before the now date or a bit later randomly
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->text,
            'location' => $this->faker->word,
            'start_date' => $this->faker->dateTimeBetween('-2 month', '+1 month'),
            'end_date' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'food' => $this->faker->boolean,
            'price' => $this->faker->randomFloat,
            'max_participants' => $this->faker->randomNumber,
            'min_participants' => $this->faker->randomNumber,
            'image' => $this->faker->word,
        ];
    }
}
