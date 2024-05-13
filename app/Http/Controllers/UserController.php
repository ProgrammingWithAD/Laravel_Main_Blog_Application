<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\user\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(){
        return view("auth.register");
    }
    function store(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string',
            'phone' => 'required|string',
            'gender' => 'required|string',
            'about' => 'required|string',
        ]);

        $password = bcrypt($request->password);
        // Create a new user instance
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password =$password;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->about = $request->about;
        
        // Save the user to the database
        $user->save();

        return redirect()->intended('/login')->with('success', 'Registerd successfully!');
    }
}
