<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Movie extends Model
{
    use HasFactory;

    // yang bisa diisi user
    protected $fillable = [
        'movie_category_id',
        'title',
        'description',
        'release_date',
        'poster_url',
        'price'
    ];

    public function movieCategory()
    {
        //biar bisa dapet category filmnya
        return $this->belongsTo(MovieCategory::class);
    }

    public function userReviews()
    {
        //biar dapet semua review film
        return $this->hasMany(UserReview::class);
    }

    protected function posterUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => 'https://picsum.photos/seed/' . $this->id . '/400/600',
        );
    }
}
