<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ForgetPasswordController extends Controller
{
    public function create()
    {
        return view('auth.forget-password');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email' => ['required', 'email'],
        ]);

        $user = User::where('email', $attributes['email'])->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'No account was found with that email.',
            ]);
        }

        return view('auth.reset-password', [
            'email' => $user->email,
        ]);
    }

    public function reset(Request $request)
    {
        return view('auth.reset-password', [
            'email' => $request->email,
        ]);
    }

    public function update(Request $request)
    {
        $attributes = $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $user = User::where('email', $attributes['email'])->first();

        $user->update([
            'password' => Hash::make($attributes['password']),
        ]);

        return redirect('/login')->with(
            'success',
            'Your password has been reset'
        );
    }
}

