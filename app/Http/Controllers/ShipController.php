<?php

namespace App\Http\Controllers;

use App\Models\Ship;
use Illuminate\Http\Request;

class ShipController extends BaseController
{
    // Display a listing of ships
    public function index()
    {
        $ships = Ship::all();
        return $this->sendResponse($ships);

    }

    // Store a newly created ship
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'            => 'required|string|max:255',
            'type'            => 'required|string',
            'length'          => 'required|integer',
            'berths'          => 'required|integer',
            'bathrooms'       => 'required|integer',
            'equipment'       => 'required',
            'crew'            => 'required',
            'route'           => 'required',
            'price_per_week'  => 'required|numeric',
            'skipper_required'=> 'required|boolean',
        ]);

        $ship = new Ship($validatedData);
        $ship->owner_id = auth()->id(); // Assuming the user is authenticated
        $ship->save();

        return $this->sendResponse($ship);

        
    }

    // Display the specified ship
    public function show($id)
    {
        $ship = Ship::findOrFail($id);
        return response()->json($ship);
    }

    // Update the specified ship
    public function update(Request $request, $id)
    {
        $ship = Ship::findOrFail($id);

        // Ensure the authenticated user is the owner
        if ($ship->owner_id != auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $validatedData = $request->validate([
            'name'            => 'sometimes|required|string|max:255',
            'type'            => 'sometimes|required|string',
            'length'          => 'sometimes|required|integer',
            'berths'          => 'sometimes|required|integer',
            'bathrooms'       => 'sometimes|required|integer',
            'equipment'       => 'sometimes|required',
            'crew'            => 'sometimes|required',
            'route'           => 'sometimes|required',
            'price_per_week'  => 'sometimes|required|numeric',
            'skipper_required'=> 'sometimes|required|boolean',
        ]);

        $ship->update($validatedData);

        return $this->sendResponse($ship);

    }

    // Remove the specified ship
    public function destroy($id)
    {
        $ship = Ship::findOrFail($id);

        // Ensure the authenticated user is the owner
        if ($ship->owner_id != auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $ship->delete();

        return $this->sendResponse('' , 'Ship Deleted');

    }
}
