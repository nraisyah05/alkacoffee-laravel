<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    /**
     * Show the login form if not authenticated.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        // Redirect to dashboard if the user is already logged in
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('general.login');
    }

    public function login(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'email' => 'required|email', // Ensure valid email format
            'password' => 'required|min:3',
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal terdiri dari 3 karakter.',
        ]);

        // Find the user by email
        $user = User::where('email', $validated['email'])->first();

        // Check if user exists and the password matches
        if ($user && Hash::check($validated['password'], $user->password)) {
            // Authenticate the user
            Auth::login($user);

            return redirect()->route('dashboard')->with('success', 'Login berhasil!');
        }

        // Redirect back with error if login fails
        return redirect()->route('login.admin')->withErrors([
            'login' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        // Log out the user
        Auth::logout();

        // Invalidate and regenerate session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to login page
        return redirect()->route('login.admin')->with('success', 'Logout berhasil.');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
        $email_user = $googleUser->email;
        // dd($email_user);

        //pengecekan email google
        $user = User::where('email', $email_user)->first();
        if ($user) {
            Auth::login($user);
            return redirect()->route('dashboard')->with('success', true);
        }

        return redirect()->route('auth')->with('error', 'Akun email tidak terdaftar');
    }
}
