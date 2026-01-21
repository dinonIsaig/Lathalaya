<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthorAuthController extends Controller
{
    public function showSignUpForm()
    {
        return view('author.sign-up');
    }

    public function signUp(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:50',
            'email' => 'required|string|email|max:100|unique:authors',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Author::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('author.sign-in.form');
    }

    public function showSignInForm()
    {
        return view('author.sign-in');
    }

    public function signIn(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (auth('author')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/author/home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function signOut(Request $request)
    {
        auth('author')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
