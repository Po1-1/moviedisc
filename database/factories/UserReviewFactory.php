<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Movie;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserReview>
 */
class UserReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'movie_id' akan ditentukan di dalam Seeder
            'user_name' => $this->faker->name(),
            'rating' => $this->faker->numberBetween(1, 5), // Rating acak dari 1 sampai 5
            'comment' => $this->faker->paragraph(2), // Komentar acak
        ];
    }
}