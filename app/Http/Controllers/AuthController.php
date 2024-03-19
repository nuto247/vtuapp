<?php

// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show Registration Form
    public function showRegistrationForm()
    {
        return view('register');
    }

    // Register User
    public function register(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',

           
        ]);
       
        dd('$request');
        // Create and save the user
        $user = \App\Models\User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        // Log the user in
        Auth::login($user);

        return redirect()->route('dashboard');
    }

    // Show Login Form
    public function showLoginForm()
    {
        return view('login');
    }

    // Login User
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('dashboard'));
        }

        return redirect()->route('login')->with('error', 'Invalid credentials');
    }

    // Logout User
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    // Dashboard
    public function dashboard()
    {
        return view('dashboard');
    }
}

