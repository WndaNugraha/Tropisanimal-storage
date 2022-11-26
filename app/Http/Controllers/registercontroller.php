<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class registercontroller extends Controller
{
    //
    public function index(){
        return view('login.register',[
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'role' => '',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255',
            'image' => 'image|file|max:1024'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['image'] = $request->file('image')->store('admin-image'); 

        User::create($validatedData);
        return redirect('/login')->with('success', 'Registration successful! Please login');

    }
}
