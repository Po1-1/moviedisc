<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_id',
        'user_name',
        'rating',
        'comment',
    ];

    protected $guarded = []; // Izinkan mass assignment
    public function movie() {
        return $this->belongsTo(Movie::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }

}
