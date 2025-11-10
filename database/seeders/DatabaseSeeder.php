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
        // 1. Buat 10 User biasa
        $users = User::factory(10)->create();

        // 2. Buat 1 User Admin (untuk login)
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            // PERBAIKAN: Gunakan Hash::make() agar konsisten dengan Laravel
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'is_admin' => true,
        ]);

        // 3. Buat 8 Kategori
        $categories = MovieCategory::factory(8)->create();

        // 4. Buat 150 Film
        $movies = Movie::factory(150)->recycle($categories)->create();

        // 5. Buat Review Acak untuk setiap film dari user biasa
        foreach ($movies as $movie) {
            UserReview::factory()
                ->count(rand(0, 8)) // 0-8 review per film
                ->create([
                    'movie_id' => $movie->id,
                    'user_id' => $users->random()->id, // Diambil dari 10 user biasa
                ]);
        }
    }
}
