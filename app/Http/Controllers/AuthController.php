<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $user = $request->user();
            $token = $user->createToken('login_token')->plainTextToken;
            //$token = $user->createToken('login_token', ['*'], now()->addMinute())->plainTextToken; süre tanımlamalı süre sonunda geçerliliğini yitiriyor.


            return response()->json([
                'status' => true,
                'message' => 'Login Successfully',
                'token' => $token,
            ], 200);
        }

        return response()->json([
            'status' => false,
            'message' => 'Email or Password is incorrect.'
        ], 401);
    }
}
