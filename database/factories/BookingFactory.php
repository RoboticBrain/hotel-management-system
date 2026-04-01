<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => \App\Models\Customer::factory()->create()->id,
            'room_id' => \App\Models\Room::factory()->create()->id,
            'checked_in' => $this->faker->date(),
            'checked_out' => $this->faker->date(),
            'room_status' => $this->faker->randomElement(['Booked', 'Available']),
            'payment_status' => $this->faker->randomElement(['pending', 'paid', 'unpaid']),
        ];
    }
}
