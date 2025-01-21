<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function viewLogin(): View
    {
        return view('auth.login', [
            'pageTitle' => 'Login',
        ]);
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->with('error-message', 'Email or Password Incorret!');
    }

    public function viewRegister(): View
    {
        return view('auth.register', [
            'pageTitle' => 'Register',
        ]);
    }

    public function register(Request $request): RedirectResponse
    {
        $rules = $request->validate([
            'username' => ['required', 'min:3', 'max:50', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8', 'string'],
        ]);

        $rules['role'] = 'user';

        User::create($rules);

        return redirect('/login');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
