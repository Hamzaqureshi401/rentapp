@extends('layouts.admin_app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mb-4">
                <div class="card-header">{{ __('Users') }}</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>email</th>
                                    <th>Type</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                                <!-- Edit Button -->
                                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>

                                                <!-- Delete Button -->
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this reservation?')">Delete</button>
                                                </form>
                                            </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            


<div class="card mb-4">
                <div class="card-header">{{ __('Ships') }}</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Ship Name</th>
                                    <th>Owner Name</th>
                                    <th>Type</th>
                                    <th>Length</th>
                                    <th>Berths</th>
                                    <th>Bathrooms</th>
                                    <th>Equipment</th>
                                    <th>Crew</th>
                                    <th>Route</th>
                                    <th>Price per Week</th>
                                    <th>Skipper Required</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($myShips as $ship)
                                <tr>
                                    <td>{{ $ship->id }}</td>
                                    <td>{{ $ship->name }}</td>
                                    <td>{{ $ship->owner->name }}</td>
                                    <td>{{ $ship->type }}</td>
                                    <td>{{ $ship->length }}</td>
                                    <td>{{ $ship->berths }}</td>
                                    <td>{{ $ship->bathrooms }}</td>
                                    <td>{{ $ship->equipment }}</td>
                                    <td>{{ $ship->crew }}</td>
                                    <td>{{ $ship->route }}</td>
                                    <td>{{ $ship->price_per_week }}</td>
                                    <td>{{ $ship->skipper_required ? 'Yes' : 'No' }}</td>
                                    <td>{{ $ship->created_at }}</td>
                                    <td>{{ $ship->updated_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">{{ __('Ships Reservations') }}</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Ship ID</th>
                                    <th>Ship Name</th>
                                    <th>Reserved By</th>
                                    <th>User Email</th>
                                    <th>Reservation Start Date</th>
                                    <th>Reservation End Date</th>
                                    <th>Skipper</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>User Reservations Count</th> <!-- Additional column -->
                                    <!-- <th>Actions</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($myShips as $ship)
                                    @foreach($ship->reservations as $reservation)
                                        <tr>
                                            <td>{{ $ship->id }}</td>
                                            <td>{{ $ship->name }}</td>
                                            <td>{{ $reservation->user->name }}</td>
                                            <td>{{ $reservation->user->email }}</td>
                                            <td>{{ $reservation->start_date }}</td>
                                            <td>{{ $reservation->end_date }}</td>
                                            <td>{{ $reservation->skipper ? 'Yes' : 'No' }}</td>
                                            <td>{{ $reservation->status }}</td>
                                            <td>{{ $reservation->created_at }}</td>
                                            <td>{{ $reservation->updated_at }}</td>
                                            <td>
                                                <!-- Display number of reservations the user has made -->
                                                {{ $reservation->user->reservations->count() }} <!-- User's reservation count -->
                                            </td>
                                            <!-- <td>
                                                
                                                <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-primary btn-sm">Edit</a>

                                                
                                                <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this reservation?')">Delete</button>
                                                </form>
                                            </td> -->
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
<div class="card mb-4">
                <div class="card-header">{{ __('All Skippers') }}</div>

                <div class="card-body">
                    <div class="table-responsive">
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Experience</th>
            <th>Available</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($availableSkippers as $skipper)
            <tr>
                <td>{{ $skipper->id }}</td>
                <td>{{ $skipper->name }}</td>
                <td>{{ $skipper->experience }}</td>
                <td>{{ $skipper->available ? 'Yes' : 'No' }}</td>
                <td>{{ $skipper->created_at }}</td>
                <td>{{ $skipper->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
</div>

<div class="card mb-4">
                <div class="card-header">{{ __('Ships Skippers') }}</div>

                <div class="card-body">
                    <div class="table-responsive">

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Ship Name</th>
            <th>Skipper Name</th>
            <th>Skipper Experience</th>
            <th>Skipper Available</th>
            <th>Average Rating</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($myShips as $ship)
            @foreach ($ship->skippers as $skipper)
                <tr>
                    <td>{{ $ship->name }}</td>
                    <td>{{ $skipper->name }}</td>
                    <td>{{ $skipper->experience }}</td>
                    <td>{{ $skipper->available ? 'Yes' : 'No' }}</td>
                    <td>{{ $ship->average_rating }}</td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
</div>
</div>
</div>

<div class="card mb-4">
                <div class="card-header">{{ __('Ships Reviews') }}</div>

                <div class="card-body">
                    <div class="table-responsive">

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Ship Name</th>
            <th>Review User Name</th>
            <th>Rating</th>
            <th>Review</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($myShips as $ship)
            @foreach ($ship->reviews as $review)
                <tr>
                    <td>{{ $ship->name }}</td>
                    <td>{{ $review->user->name }}</td>
                    <td>{{ $review->rating }} / 5</td>
                    <td>{{ $review->review }}</td>
                    
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
</div>
</div>
</div>


        </div>
    </div>
</div>
@endsection
