<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Movie extends Model
{
    use HasFactory;

    /** Mass assignable attributes */
    protected $fillable = [
        'movie_category_id',
        'title',
        'description',
        'release_date',
        'poster_url',
        'price',
    ];

    public function movieCategory()
    {
        return $this->belongsTo(MovieCategory::class);
    }

    public function userReviews()
    {
        return $this->hasMany(UserReview::class);
    }

    /**
     * Menghasilkan URL gambar yang konsisten berdasarkan ID film.
     */
    protected function posterUrl(): Attribute
    {
        return Attribute::make(
            // Gunakan ID film sebagai 'seed' untuk gambar
            get: fn () => 'https://picsum.photos/seed/' . $this->id . '/400/600',
        );
    }
}
