<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = Auth::guard('api')->attempt($credentials)) {
            // Check if no token is provided
            if (!$token) {
                // Return a response indicating no token provided
                return response()->json(['error' => 'No token provided.'], 401);
            }

            // Check if the credentials are incorrect
            if (!User::where('email', $request->email)->exists()) {
                // Return a response indicating email not found
                return response()->json(['error' => 'Email not found. Please check your email.'], 401);
            }

            // Return a response indicating invalid password
            return response()->json(['error' => 'Invalid password. Please check your password.'], 401);
        }

        // Return a successful response with the JWT token
        return $this->respondWithToken($token);
    }


    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60 // JWTAuth::factory() is used here
        ]);
    }
}
