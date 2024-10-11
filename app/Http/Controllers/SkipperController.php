<?php

namespace App\Http\Controllers;

use App\Models\Skipper;
use Illuminate\Http\Request;

class SkipperController extends BaseController
{
    // Display a listing of skippers
    public function index()
    {
        // Retrieve all skippers
        $skippers = Skipper::all();
        
        return $this->sendResponse($skippers);
    }

    // Show the form for creating a new skipper
    public function create()
    {
        // Return a view for creating a skipper (if you're using views)
        return view('skippers.create');
    }

    // Store a newly created skipper in the database
    public function store(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'experience' => 'required|integer|min:0',
            'available' => 'sometimes|boolean',
        ]);

        // Create a new skipper
        $skipper = Skipper::create($validated);

        return $this->sendResponse($skipper);
    
    }

    // Display the specified skipper
    public function show(Skipper $skipper)
    {
        return response()->json($skipper);
    }

    // Show the form for editing a skipper
    public function edit(Skipper $skipper)
    {
        // Return a view for editing the skipper (if you're using views)
        return view('skippers.edit', compact('skipper'));
    }

    // Update the specified skipper in the database
    public function update(Request $request, Skipper $skipper)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'experience' => 'required|integer|min:0',
            'available' => 'sometimes|boolean',
        ]);

        // Update the skipper
        $skipper->update($validated);

        return $this->sendResponse($skipper);
    }

    // Remove the specified skipper from the database
    public function destroy(Skipper $skipper)
    {
        $skipper->delete();

        return $this->sendResponse('' , 'Skipper Deleted Successfully!');
    }
}
