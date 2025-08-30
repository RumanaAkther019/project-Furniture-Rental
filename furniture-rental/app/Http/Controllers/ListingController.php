<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index()
    {
        $listings = Listing::all();
        return view('listings.index', compact('listings'));
    }

    public function create()
    {
        return view('listings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'condition' => 'required|in:Excellent,Good,Fair,Poor',
            'rent_per_month' => 'required|numeric|min:0',
            'availability' => 'boolean'
        ]);

        Listing::create([
            'item_name' => $request->item_name,
            'condition' => $request->condition,
            'rent_per_month' => $request->rent_per_month,
            'availability' => $request->has('availability')
        ]);

        return redirect()->route('listings.index')
            ->with('success', 'Furniture item added successfully.');
    }

    public function show(Listing $listing)
    {
        return view('listings.show', compact('listing'));
    }

    public function edit(Listing $listing)
    {
        return view('listings.edit', compact('listing'));
    }

    public function update(Request $request, Listing $listing)
    {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'condition' => 'required|in:Excellent,Good,Fair,Poor',
            'rent_per_month' => 'required|numeric|min:0',
            'availability' => 'boolean'
        ]);

        $listing->update([
            'item_name' => $request->item_name,
            'condition' => $request->condition,
            'rent_per_month' => $request->rent_per_month,
            'availability' => $request->has('availability')
        ]);

        return redirect()->route('listings.index')
            ->with('success', 'Furniture item updated successfully');
    }

    public function destroy(Listing $listing)
    {
        $listing->delete();

        return redirect()->route('listings.index')
            ->with('success', 'Furniture item deleted successfully');
    }
}