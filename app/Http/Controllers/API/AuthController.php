<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function login(Request $request)
{
    // Validate login credentials
    $validated = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Check if the login credentials are correct
    if (!auth()->attempt($validated)) {
        return response()->json(['message' => 'Invalid login details'], 401);
    }

    // Retrieve the authenticated user
    $user = auth()->user();

    // Generate a new API token and store it in the user's `api_token` column
    $apiToken = Str::random(60);
    $user->update(['api_token' => $apiToken]);

    // Return the response with the generated token and user data
    return response()->json([
                'code' => '200' , 
                'status'=>'success' , 
                'message'=>'User Login Successfully!' , 
                'data' => $user
            ]);

    

}

   
public function register(Request $request)
{
    // Validate the incoming request
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
        'isRenter' => 'required|boolean',  // Determine if the user is a renter
    ]);

     if ($request->isRenter) {
        $request['isRenter'] = 'renter';
    } else {
       $request['isRenter'] = 'buyer';
    }


    // Create a new user
    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'role' => $request['isRenter'] 
    ]);

   
    $user->save();

    return response()->json([
        'message' => 'User registered successfully!',
        'user' => $user,
    ], 201);
}

}
