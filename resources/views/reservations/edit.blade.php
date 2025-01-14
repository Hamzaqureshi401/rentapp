@extends('layouts.admin_app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-between">
        <div class="col-md-12"> <!-- Adjust the width of the form here -->
            <div class="card">
                <div class="card-header">{{ __('Edit Reservation') }}</div>

                <div class="card-body">
                    <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $reservation->start_date }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="end_date">End Date</label>
                            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $reservation->end_date }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="pending" {{ $reservation->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="confirmed" {{ $reservation->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="cancelled" {{ $reservation->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="skipper">Skipper Required</label>
                            <select name="skipper" id="skipper" class="form-control">
                                <option value="1" {{ $reservation->skipper ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ !$reservation->skipper ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                    </div>

                        <button type="submit" class="btn btn-primary btn-block">Update Reservation</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
