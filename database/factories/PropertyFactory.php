<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            '_fk_location' => \App\Models\Location::factory()->create()->getKey(),
            'property_name' => $this->faker->word,
            'near_beach' => $this->faker->boolean,
            'accepts_pets' => $this->faker->boolean,
            'sleeps' => $this->faker->numberBetween(1, 10),
            'beds' => $this->faker->numberBetween(1, 5),
        ];
    }
}
