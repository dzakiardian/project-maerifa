<?php

namespace App\Http\Controllers;

use App\Models\User;
use Error;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $userLogin = Auth::user();

        return view('dashboard.index', [
            'pageTitle' => 'Dashboard',
            'active' => 'dashboard',
            'userLogin' => $userLogin,
        ]);
    }

    public function profile(): View
    {
        $userLogin = Auth::user();

        return view('dashboard.profile', [
            'pageTitle' => 'Profile',
            'active' => 'profile',
            'userLogin' => $userLogin,
        ]);
    }

    public function updateProfile(Request $request, string $id)
    {
        $rules = $request->validate([
            'username' => ['required', 'min:3', 'max:50'],
            'email' => ['required', 'email'],
        ]);

        try {
            $user = User::findOrFail($id);
            $user->update($rules);
            return back()->with('success-message', 'Profile success updated!');
        } catch (ModelNotFoundException $e) {
            return back()->with('error-message', 'User not found:(');
        } catch (Exception $e) {
            return back()->with('error-message', 'An unexpected error occurred: ' . $e->getMessage());
        }
    }

    public function changePassword(Request $request, string $id): RedirectResponse
    {
        $rules = $request->validate([
            'password_current' => ['required'],
            'password_new' => ['required', 'min:8'],
        ]);

        try {
            $user = User::findOrFail($id);
            if (!Hash::check($rules['password_current'], $user->password)) {
                return back()->with('error-message', 'password incorret!');
            } else {
                $user->update(['password' => Hash::make($rules['password_new'])]);

                return back()->with('success-message', 'Change password success!');
            }
        } catch (ModelNotFoundException $e) {
            return back()->with('error-message', 'User not found:(');
        } catch (Exception $e) {
            return back()->with('error-message', 'An unexpected error occurred: ' . $e->getMessage());
        }
    }

    public function articles(): View
    {
        return view('dashboard.articles.index', [
            'pageTitle' => 'Articles',
            'active' => 'articles',
        ]);
    }

    public function detailArticle(string $id): View
    {
        return view('dashboard.articles.detail', [
            'pageTitle' => 'Detail Article ' . $id,
            'active' => 'articles',
        ]);
    }
}
