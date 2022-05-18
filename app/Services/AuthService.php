<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class AuthService
{
    /**
     * login
     *
     * @param  LoginRequest $request
     * @return void
     */
    public function login($request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $token = Auth::user()->createToken('authToken')->plainTextToken;
            return response()->json(['message' => 'Login Successful', 'token' => $token], 200);
        } else {
            return response()->json(['message' => 'Login Failed'], 401);
        }
    }

    /**
     * logout
     *
     * @return void
     */
    public function logout()
    {
        Auth::user()->tokens()->delete();
        return response()->json(['message' => 'Logout Successful'], 200);
    }
}
