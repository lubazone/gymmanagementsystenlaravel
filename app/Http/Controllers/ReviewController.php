<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    //
    public function index()
    {
        // Logic to fetch and display reviews
        $reviews = Review::all();
        return view('admin.review.index', compact('reviews'));
    }
    public function create()
    {
        // Logic to show the form for creating a new review
        return view('user.review.create');
    }
    public function store(Request $request)
    {
        // Logic to store a new review
        $request->validate([
            'review' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
        ]);
        $userId = Auth::id();
        //dd($userId);
        Review::create([
            'user_id' => $userId,
            'review' => $request->input('review'),
            'rating' => $request->input('rating'),
        ]);

        return redirect()->route('review.create')->with('success', 'Review created successfully.');
    }
    //approve
    public function approve($id)
    {
        // Logic to approve a review
        $review = Review::findOrFail($id);
        $review->status = 'approved'; // Assuming you have a status field in your reviews table
        $review->update();

        return redirect()->route('review.index')->with('success', 'Review approved successfully.');
    }
    //delete
    public function destroy($id)
    {
        // Logic to delete a review
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('review.index')->with('success', 'Review deleted successfully.');
    }
}
