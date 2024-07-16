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

    public function edit($reviewId)
    {
        $review = Review::findOrFail($reviewId);
        // Pastikan hanya pengguna yang menulis ulasan yang dapat mengeditnya
        if ($review->user_id != auth()->id()) {
            return redirect()->route('user.orders.history')->with('error', 'Unauthorized access');
        }
        return view('user.payment.edit_review', compact('review'));
    }

    public function update(Request $request, $reviewId)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'review' => 'required|string|max:255',
        ]);

        $review = Review::findOrFail($reviewId);
        // Pastikan hanya pengguna yang menulis ulasan yang dapat memperbarui
        if ($review->user_id != auth()->id()) {
            return redirect()->route('user.orders.history')->with('error', 'Unauthorized access');
        }

        $review->rating = $request->rating;
        $review->review = $request->review;
        $review->save();

        return redirect()->route('orders.history')->with('success', 'Review updated successfully.');
    }
}
