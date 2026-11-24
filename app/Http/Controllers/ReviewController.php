<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Customer;
use App\Models\Kamar;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with(['customer', 'kamar'])
            ->latest()
            ->get();

        return view('reviews.index', compact('reviews'));
    }

    public function create()
    {
        $customers = Customer::all();
        $kamars = Kamar::all();

        return view('reviews.create', compact('customers', 'kamars'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'kamar_id' => 'required|exists:kamars,id',
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string',
        ]);

        Review::create($validated);

        return redirect()->route('reviews.index')
            ->with('success', 'Ulasan berhasil ditambahkan.');
    }

    public function show(Review $review)
    {
        $review->load(['customer', 'kamar']);

        return view('reviews.show', compact('review'));
    }

    public function edit(Review $review)
    {
        $customers = Customer::all();
        $kamars = Kamar::all();

        return view('reviews.edit', compact('review', 'customers', 'kamars'));
    }

    public function update(Request $request, Review $review)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'kamar_id' => 'required|exists:kamars,id',
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string',
        ]);

        $review->update($validated);

        return redirect()->route('reviews.index')
            ->with('success', 'Ulasan berhasil diperbarui.');
    }

    public function destroy(Review $review)
    {
        $review->delete();

        return redirect()->route('reviews.index')
            ->with('success', 'Ulasan berhasil dihapus.');
    }
}