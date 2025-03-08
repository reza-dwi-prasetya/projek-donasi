<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        if (!auth()->attempt($request->only('email', 'password'))) {
            return back()->withErrors([
                'email' => 'Email atau password salah.'
            ])->onlyInput('email');
        }

        return to_route('home');
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', Rule::unique(User::class, 'email')],
            'password' => ['required', 'string', 'min:8'],
            'address' => 'nullable|string',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'donatur',
            'address' => 'nullable|string',
            'is_active' => true,
        ]);

        return to_route('login-form');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();

        return to_route('home');
    }
}
