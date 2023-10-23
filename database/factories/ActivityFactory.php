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
        $minParticipants = $this->faker->numberBetween(1, 30);
        $maxParticipants = $this->faker->numberBetween($minParticipants, 30);
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->text,
            'location' => $this->faker->word,
            'start_date' => $this->faker->dateTimeBetween('-2 month', '+1 month'),
            'end_date' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'food' => $this->faker->boolean,
            'price' => $this->faker->randomFloat(2),
            'max_participants' => $maxParticipants,
            'min_participants' => $minParticipants,
            'image' => $this->faker->imageUrl(),
        ];
    }
}
