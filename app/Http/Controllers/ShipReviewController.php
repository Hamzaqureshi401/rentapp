<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShipReview;
use Auth;

class ShipReviewController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = ShipReview::with('user', 'ship')->get();

        return $this->sendResponse($reviews);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ship_id' => 'required|exists:ships,id',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string',
        ]);

        $request['user_id'] = Auth::id();

        $review = ShipReview::create($validated);

        return $this->sendResponse($review);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $review = ShipReview::with('user', 'ship')->findOrFail($id);

        return $this->sendResponse($review);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $review = ShipReview::findOrFail($id);

        $validated = $request->validate([
            'rating' => 'sometimes|integer|min:1|max:5',
            'review' => 'nullable|string',
        ]);

        $review->update($validated);

        return $this->sendResponse($review);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $review = ShipReview::findOrFail($id);
        $review->delete();

        return $this->sendResponse('' , 'Review Deleted');

    }

}
