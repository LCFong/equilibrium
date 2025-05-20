<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request){
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'gender' => 'string',
            'education' => 'string',
            'password' => 'required|string',
        ]);
        // dd( $validated );

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'gender' => $validated['gender'],
            'password' => Hash::make($validated['password']),
            'education' => $validated['education'],
        ]);

        return redirect('/login')->with('success', 'Registration successful!');

    }
}