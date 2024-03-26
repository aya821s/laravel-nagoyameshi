<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class ReviewController extends Controller

{
    public function index(Restaurant $restaurant) {
        return view('restaurants.review');
    }

    public function store(Request $request)
    {
        $request->validate([
             'content' => 'required'
         ]);
 
         $review = new Review();
         $review->content = $request->input('content');
         $review->restaurant_id = $request->input('restaurant_id');
         $review->user_id = Auth::user()->id;
         $review->score = $request->input('score');
         $review->save();
 
         return back();
    }
}

