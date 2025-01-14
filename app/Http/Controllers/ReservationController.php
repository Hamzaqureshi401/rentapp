<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Ship;
use Illuminate\Http\Request;

class ReservationController extends BaseController
{
    // List all reservations for the authenticated user
    public function index()
    {
        $reservations = Reservation::with('user','ship')->where('user_id', auth()->id())->get();
        return $this->sendResponse($reservations);

    }

    public function edit(Reservation $reservation)
    {
        return view('reservations.edit', compact('reservation'));
    }


    // Store a new reservation
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ship_id'    => 'required|exists:ships,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date'   => 'required|date|after:start_date',
            'skipper'    => 'required|boolean',
        ]);

        $validatedData['user_id'] = auth()->id();
        $validatedData['status'] = 'pending';

        $reservation = Reservation::create($validatedData);

        return $this->sendResponse($reservation);
    }

    // Show a specific reservation
    public function show($id)
    {
        $reservation = Reservation::where('user_id', auth()->id())->findOrFail($id);
        return $this->sendResponse($reservation);
    }

    // Update a reservation (e.g., cancel it)
   public function update(Request $request, Reservation $reservation)
{
    // Ensure the reservation belongs to the logged-in user (optional check)
    // If you need to add any user-specific checks, you can do so here.

    $validatedData = $request->validate([
        'status' => 'required|in:pending,confirmed,canceled', // Validation for enum values
    ]);

    // Update the reservation
    $reservation->update($validatedData);

    // Check if the request expects a JSON response (API request) or is a web request
    if ($request->expectsJson()) {
        // Return a JSON response for API requests
        return $this->sendResponse($reservation);
    } else {
        // Redirect to the reservation list page for web requests
        return redirect()->route('reservations.index')->with('success', 'Reservation updated successfully!');
    }
}


    // Delete a reservation
    public function destroy($id)
    {
        $reservation = Reservation::where('user_id', auth()->id())->findOrFail($id);
        $reservation->delete();

        return $this->sendResponse('' , 'Reservation Deleted');
    }
}
