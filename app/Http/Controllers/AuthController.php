<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // sleep(1);

        $fields = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => ['required', 'confirmed', 'min:3'],
            'avatar' => ['file', 'nullable', 'max:20'],
        ]);

        if ($request->hasFile("avatar")) {
            // $request->validate([
            //     'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // ]);

            $fields['avatar'] = Storage::disk('public')->put('avatars', $request->avatar);
        }

        $user = User::create($fields);

        Auth::login($user);

        return redirect()->route('dashboard')->with('success','Welcome to the family!');
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email'=> ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($fields, $request->remember)) {
            $request->session()->regenerate();



            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email'=> 'The provided credentials do not match our records.',
        ])->onlyInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
