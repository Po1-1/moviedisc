<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\MovieCategory;
use App\Models\UserReview;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // 10 User
        $users = User::factory(10)->create();

        // 2. Buat 1 User Admin (untuk login)
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'is_admin' => true,
        ]);

        // Kategori
        $categories = MovieCategory::factory(8)->create();

        // 150 Film
        $movies = Movie::factory(150)->recycle($categories)->create();

        // Review Acak untuk setiap film dari user biasa
        foreach ($movies as $movie) {
            UserReview::factory()
                ->count(rand(0, 8))
                ->create([
                    'movie_id' => $movie->id,
                    'user_id' => $users->random()->id,
                ]);
        }
    }
}
