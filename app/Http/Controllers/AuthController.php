<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'password' => Hash::make($request->password),
        ]);
        return response()->json($user, 201);
    }

    // public function login(Request $request){
    //     $credentials = $request->only('email', 'password');
    //     if (Auth::attempt($credentials)) {
    //         $user = Auth::user();
    //         $token = $user->createToken('authToken')->plainTextToken;

    //         return response()->json([
    //             'message' => 'Login successful',
    //             'token' => $token,
    //             'user' => $user
    //         ], 200);
    //     }

    //     return response()->json(['message' => 'Invalid credentials'], 401);
    // }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                \Log::info('Invalid credentials provided for login', $credentials);
                return response()->json(['message' => 'Invalid credentials'], 401);
            }
        } catch (JWTException $e) {
            \Log::error('Token creation failed: ' . $e->getMessage());
            return response()->json(['message' => $e->getMessage()], 500);
        }

        $user = JWTAuth::user();

        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
            'user' => $user
        ], 200);
    }

}
