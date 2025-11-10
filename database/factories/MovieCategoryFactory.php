<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MovieCategory>
 */
class MovieCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return ['name' => $this->faker->unique()->randomElement(['Action', 'Comedy', 'Horror', 'Sci-Fi', 'Drama', 'Thriller', 'Romance', 'Animation'])];
    }
}
