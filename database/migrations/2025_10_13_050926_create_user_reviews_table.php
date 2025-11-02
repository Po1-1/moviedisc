<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    
    public function up(): void {
    Schema::create('user_reviews', function (Blueprint $table) {
        $table->id();
        $table->foreignId('movie_id')->constrained()->onDelete('cascade');
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Terhubung ke user login
        $table->unsignedTinyInteger('rating'); // Rating 1-5
        $table->text('comment');
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('user_reviews');
    }
};
