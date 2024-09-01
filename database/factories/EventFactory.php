<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'from' => $this->faker->dateTimeInInterval('+1 week', '+2 week'),
            'to' => $this->faker->dateTimeInInterval('+1 week', '+2 week'),
            'location' => $this->faker->address(),
            'user_id' => $this->faker->numberBetween(1, 1),
        ];
    }
}
