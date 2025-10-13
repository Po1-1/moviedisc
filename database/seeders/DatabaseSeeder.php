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
        // Buat 8 kategori film
        $categories = MovieCategory::factory(8)->create();

        // Buat 150 film dan kaitkan dengan kategori yang ada secara acak
        $movies = Movie::factory(150)->recycle($categories)->create();

        // Untuk setiap film, buat antara 0 hingga 8 review acak
        foreach ($movies as $movie) {
            UserReview::factory()
                ->count(rand(0, 8)) // Jumlah review acak
                ->create([
                    'movie_id' => $movie->id, // Tautkan review ke film ini
                ]);
        }
    }
}
