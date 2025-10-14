<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
}
