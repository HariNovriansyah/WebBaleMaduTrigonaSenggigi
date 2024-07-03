<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string',
        ]);

        // Cek apakah user sudah memberikan review untuk produk ini
        $existingReview = Review::where('user_id', auth()->id())
                                ->where('product_id', $request->input('product_id'))
                                ->first();

        if ($existingReview) {
            return redirect()->back()->with('error', 'You have already reviewed this product.');
        }

        Review::create([
            'user_id' => auth()->id(),
            'product_id' => $request->input('product_id'),
            'rating' => $request->input('rating'),
            'review' => $request->input('review'),
        ]);

        return redirect()->back()->with('success', 'Review submitted successfully.');
    }
}
