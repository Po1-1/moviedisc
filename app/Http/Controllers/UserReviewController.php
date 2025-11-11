<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use App\Models\UserReview;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserReviewController extends Controller
{
    public function store(Request $request, Movie $movie)
    {
        // 1. Validasi
        $validated = $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'required|string|min:10',
        ]);

        // 2. Simpan review (pastikan user belum pernah review film ini)
        UserReview::updateOrCreate(
            [
                'movie_id' => $movie->id,
                'user_id' => Auth::id(), // Ambil ID user yang sedang login
            ],
            [
                'rating' => $validated['rating'],
                'comment' => $validated['comment'],
            ]
        );

        // 3. Kembali ke halaman film
        return redirect()->route('movies.show', $movie->id)->with('success', 'Review added successfully!');
    }
    public function destroy(UserReview $review) 
    {
        //cek akun
        if (Auth::id() !== $review->user_id) {
            return back()->with('error', 'You are not authorized to delete this review.');
        }

        // Hapus review
        $review->delete();

        // tombok back
        return back()->with('success', 'Your review has been deleted.');
    }
}
