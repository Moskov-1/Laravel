<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signup(Request $request){
        $validatedData = $request->validate([
            "name" => "required",
            "email"=> "required|string|email|unique:users",
            "password"=> "required",
            ]);
        $user = User::create($validatedData);
        $token = $user->createToken('auth_token')->plainTextToken;
        return [$user, $token];
    }
}
