<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Movie extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Relasi
    public function movieCategory() {
        return $this->belongsTo(MovieCategory::class);
    }

    public function userReviews() {
        return $this->hasMany(UserReview::class);
    }

    // ACCESSOR PINTAR: Untuk menampilkan gambar
    public function getPosterDisplayUrlAttribute()
    {
        // 1. Cek jika URL adalah eksternal (dari seeder Picsum)
        if (Str::startsWith($this->poster_url, ['http', 'https'])) {
            return $this->poster_url;
        }

        // 2. Cek jika file ada di storage (dari upload admin)
        if ($this->poster_url && Storage::disk('public')->exists($this->poster_url)) {
            return Storage::url($this->poster_url);
        }

        // 3. Gambar default jika tidak ada
        return 'https://via.placeholder.com/400x600.png?text=No+Image';
    }
}
