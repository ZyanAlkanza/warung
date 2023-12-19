<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view('home.register');
    }

    public function store(Request $request){
        
        $request->validate([
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required|min:3',
            ],
            [
            'name.required' => 'This field is Required',
            'email.required' => 'This field is Required',
            'password.required' => 'This field is Required',
            'password_confirmation.required' => 'This field is Required',
            ]
        );

        
 
        $request = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect('login')->with('status', 'Register Success');
    }
}
