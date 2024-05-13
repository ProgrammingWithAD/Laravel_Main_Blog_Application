<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index(){
        return view("auth.login");
    }
    function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
if(Auth::attempt($credentials)){
    return redirect()->intended('/dashboard')->with('success', 'Welcome back, ' . Auth::user()->name . '!');

}else {
    // Authentication failed, redirect back with error message
    return redirect()->back()->withInput()->withErrors(['email' => 'Invalid credentials']);
}

    }


     function logout(Request $request)
    {
        Auth::logout(); // Logout the currently authenticated user
        return redirect()->route('login'); // Redirect to the login page after logout
    }

}
