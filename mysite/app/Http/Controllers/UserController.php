<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request){
        $validatedData = $request->validate(
            [
                "name" => ["required", 'min:3', Rule::unique("users","name")],
                "email"=> "required|email",
                "password"=> "required|min:3|max:10",
            ]
        );
        $validatedData['password'] = bcrypt($validatedData['password']);
        $user = User::create($validatedData);
        auth()->login($user);
        return redirect('/');
    }

}
