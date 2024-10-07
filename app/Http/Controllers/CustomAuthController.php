<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CustomAuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|min:3',
            ]);

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 422);
            }
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
        } catch (\Exception $e) {
            //Beklenmeyen hataları yakalamak için
            return response()->json(['message' => 'An error occurred while trying to save the comment!', 'error' => $e->getMessage()], 500);
        }
    }
}
