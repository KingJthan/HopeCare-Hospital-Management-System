<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|confirmed',
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ], 201);
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $fields['email'])->first();

        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }

        $token = $user->createToken('my-app-token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ], 200);
    }

    public function profile(Request $request)
    {
        return response()->json([
            'user' => $request->user(),
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out successfully',
        ]);
    }
}