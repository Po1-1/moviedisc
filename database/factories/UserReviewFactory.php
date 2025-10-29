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
        // 'movie_id' dan 'user_id' akan diisi oleh Seeder
        'rating' => $this->faker->numberBetween(1, 5),
        'comment' => $this->faker->paragraph(2)
    ];
    }
}