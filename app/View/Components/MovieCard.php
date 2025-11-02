<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use App\Models\Movie;
use Illuminate\View\Component;

class MovieCard extends Component
{public $movie; // <-- Tambahkan
    public function __construct(Movie $movie) { // <-- Edit
        $this->movie = $movie;
    }
    public function render() {
        return view('components.movie-card');
    }
}
