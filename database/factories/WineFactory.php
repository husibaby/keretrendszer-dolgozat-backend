<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wine>
 */
class WineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->firstNameFemale(), 
            "vinery" => fake()->company(), 
            "grape_variety" => fake()->word(),
            "vintage" => fake()->numberBetween(1800, 2023),
            "price" => fake()->numberBetween(1, 999999),
        ];
    }
}
