<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use App\Models\Editor;
use App\Models\EditorsID;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EditorAuthController extends Controller
{
    public function showSignUpForm()
    {
        return view('editor.sign-up');
    }

    public function signUp(Request $request)
    {
        $request->validate([
            'editor_number' => 'required|digits:4|exists:editorsID,editor_number',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|string|email|max:100|unique:editors',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $editorID = EditorsID::where('editor_number', $request->editor_number)->first();

        if ($editorID->status !== 'Inactive') {
            return back()->withErrors([
                'editor_number' => 'This editor number is already in use.',
            ]);
        }

        $editor = Editor::create([
            'editor_number' => $request->editor_number,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $editorID->status = 'Active';
        $editorID->save();


        return redirect()->route('editor.sign-in.form');
    }

    public function showSignInForm()
    {
        return view('editor.sign-in');
    }

    public function signIn(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (auth('editor')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/pam/editor/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function signOut(Request $request)
    {
        auth('editor')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/pam');
    }
}
