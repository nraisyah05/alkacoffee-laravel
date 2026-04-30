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
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required|min:3',
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal terdiri dari 3 karakter.',
        ]);

        $user = User::where('username', $validated['username'])->first();

        if ($user && Hash::check($validated['password'], $user->password)) {
            Auth::login($user);
            return redirect()->route('dashboard')->with('success', 'Login berhasil!');
        }

        return redirect()->route('login.admin')->withErrors([
            'login' => 'Username atau password salah.',
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
