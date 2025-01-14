@extends('layouts.admin_app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mb-4">
                <div class="card-header">{{ __('Edit User') }}</div>

                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-3">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                        </div>
</div>
<div class="col-md-3">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                        </div>
</div>
<div class="col-md-3">
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" id="role" name="role">
                                <option value="renter" {{ $user->role == 'renter' ? 'selected' : '' }}>Renter</option>
                                <option value="buyer" {{ $user->role == 'buyer' ? 'selected' : '' }}>Buyer</option>
                            </select>
                        </div>
</div>
<div class="col-md-3">
                        <!-- Password field -->
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Leave blank to keep the current password">
                        </div>
</div>
<div class="col-md-3">
                        <!-- Confirm password field -->
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm the new password">
                        </div>
</div>
                        </div>
                        <button type="submit" class="btn btn-success">Update User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
