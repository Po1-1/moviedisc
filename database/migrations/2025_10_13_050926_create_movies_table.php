<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    
    public function up(): void {
    Schema::create('movies', function (Blueprint $table) {
        $table->id();
        $table->foreignId('movie_category_id')->constrained()->onDelete('cascade');
        $table->string('title');
        $table->text('description');
        $table->date('release_date');
        $table->string('poster_url'); // Akan diisi oleh seeder (URL) atau admin (path file)
        $table->decimal('price', 10, 2); // Sesuaikan dengan harga (misal: Rupiah)
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
