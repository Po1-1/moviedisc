<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MovieCategory extends Model
{
    use HasFactory;

    /** Mass assignable attributes */
    protected $fillable = [
        'name',
    ];

    public function movies()
    {
        return $this->hasMany(Movie::class);
    }
}
