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
            '_fk_property' => \App\Models\Property::factory()->create()->getKey(),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
        ];
    }

}
