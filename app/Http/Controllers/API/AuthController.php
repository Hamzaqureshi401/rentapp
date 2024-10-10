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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['access_token' => $token, 'token_type' => 'Bearer', 'user' => $user]);
    }
}
