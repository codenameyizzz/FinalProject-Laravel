<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store($film_id, Request $request) {
        $request->validate([
            'content' => 'required', 
            'point'=> 'required',
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'film_id' => $film_id,
            'content'=> $request->input('content'),
            'point' => $request->input('point'),
        ]);

        return redirect('/film/'. $film_id);
    }
}
