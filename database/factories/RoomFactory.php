<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'room_number' => $this->faker->unique()->numberBetween(100, 999),
            'room_type' => $this->faker->randomElement(['Single', 'Double', 'Suite']),
            'status' => $this->faker->randomElement(['available', 'booked']),
            'price' => $this->faker->randomFloat(2, 50, 500),
            'image' => 'images/rooms/room.jpg',
        ];
    }
}
