<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;

    public function movieCategory()
    {
        return $this->belongsTo(MovieCategory::class);
    }

    public function userReviews()
    {
        return $this->hasMany(UserReview::class);
    }
}
