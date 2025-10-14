<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserReview extends Model
{
    use HasFactory;

    /** Mass assignable attributes */
    protected $fillable = [
        'movie_id',
        'user_name',
        'rating',
        'comment',
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

}
