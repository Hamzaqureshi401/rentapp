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
        $reservations = Reservation::where('user_id', auth()->id())->get();
        return $this->sendResponse($reservations);

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
    public function update(Request $request, $id)
    {
        $reservation = Reservation::where('user_id', auth()->id())->findOrFail($id);

        $validatedData = $request->validate([
            'status' => 'required|in:canceled',
        ]);

        $reservation->update($validatedData);

        return $this->sendResponse($reservation);
    }

    // Delete a reservation
    public function destroy($id)
    {
        $reservation = Reservation::where('user_id', auth()->id())->findOrFail($id);
        $reservation->delete();

        return $this->sendResponse('' , 'Reservation Deleted');
    }
}
