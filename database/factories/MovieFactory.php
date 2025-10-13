<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\MovieCategory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randomImageUrl = 'https://picsum.photos/400/600?random=' . $this->faker->unique()->randomNumber();
        
        return [
            'movie_category_id' => MovieCategory::factory(),
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(4),
            'release_date' => $this->faker->date(),
            'poster_url' => $randomImageUrl, // Placeholder image
            'price' => $this->faker->randomFloat(2, 5, 25),
        ];
    }
}
