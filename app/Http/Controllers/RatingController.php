<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function store(Request $request, Music $music)
    {
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $rating = new Rating;
        $rating->user_id = Auth::id();
        $rating->music_id = $music->id;
        $rating->rating = $validatedData['rating'];
        $rating->save();

        return redirect()->back();
    }

    public function update(Request $request, Rating $rating)
    {
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $rating->rating = $validatedData['rating'];
        $rating->save();

        return redirect()->back();
    }
}
