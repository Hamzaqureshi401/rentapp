<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Ship;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    // List all reservations for the authenticated user
    public function index()
    {
        $reservations = Reservation::where('user_id', auth()->id())->get();
        return response()->json($reservations);
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

        return response()->json($reservation, 201);
    }

    // Show a specific reservation
    public function show($id)
    {
        $reservation = Reservation::where('user_id', auth()->id())->findOrFail($id);
        return response()->json($reservation);
    }

    // Update a reservation (e.g., cancel it)
    public function update(Request $request, $id)
    {
        $reservation = Reservation::where('user_id', auth()->id())->findOrFail($id);

        $validatedData = $request->validate([
            'status' => 'required|in:canceled',
        ]);

        $reservation->update($validatedData);

        return response()->json($reservation);
    }

    // Delete a reservation
    public function destroy($id)
    {
        $reservation = Reservation::where('user_id', auth()->id())->findOrFail($id);
        $reservation->delete();

        return response()->json(['message' => 'Reservation deleted successfully']);
    }
}
