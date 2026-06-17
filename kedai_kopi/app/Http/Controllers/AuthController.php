<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    /**
     * Show login form
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Process login request
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        // Attempt to authenticate
        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()->withInput($request->only('email'))
                ->with('error', 'Email atau password salah. Silakan coba lagi.');
        }

        // Regenerate session for security
        $request->session()->regenerate();

        $user = Auth::user();

        // Redirect based on role
        return match ($user->role) {
            'admin' => redirect()->route('dashboard.index')->with('success', 'Selamat datang ' . $user->name),
            'barista' => redirect()->route('dashboard.index')->with('success', 'Selamat datang ' . $user->name),
            'user' => redirect()->route('customer.dashboard')->with('success', 'Selamat datang ' . $user->name),
            default => redirect('/login')->with('error', 'Role tidak dikenali'),
        };
    }

    /**
     * Show register form
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Process register request
     */
    public function register(RegisterRequest $request)
    {
        try {
            $validated = $request->validated();

            // Create new user with role 'user' (customer)
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => 'user',
            ]);

            return redirect('/login')
                ->with('success', 'Akun berhasil dibuat! Silakan login dengan email dan password Anda.');
        } catch (\Exception $e) {
            return back()->withInput($request->only('name', 'email'))
                ->with('error', 'Terjadi kesalahan saat membuat akun. Silakan coba lagi.');
        }
    }

    /**
     * Process logout request
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Anda telah berhasil logout.');
    }

    /**
     * Check authentication status
     */
    public function check()
    {
        return Auth::check() ? response()->json(['authenticated' => true]) : response()->json(['authenticated' => false], 401);
    }
}
