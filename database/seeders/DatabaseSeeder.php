<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\MovieCategory;

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
        Movie::factory(150)->recycle($categories)->create();
    }
}
