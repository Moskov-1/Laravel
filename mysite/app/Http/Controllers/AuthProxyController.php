<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthProxyController extends Controller
{
    public function loadLogin(){
        return view("login");
    }
    public function login(Request $request){
        $validatedUser = $request->validate([
            "email"=>["required","email"],
            "password"=>["required","string"],
        ]);
        if(auth()->attempt($validatedUser)){
            $request->session()->regenerate();
            return redirect('/');
        }
        return redirect()->back()->with("error","Wrong Credentials");
    }
    public function logout(Request $request){
        auth()->logout();
        return redirect('/');
    }
}
