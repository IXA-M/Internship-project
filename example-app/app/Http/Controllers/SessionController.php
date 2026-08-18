<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function login(){
  return view("auth.login");
    }
    public function destroy(Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return view("auth.login");
}
public function SignIn(Request $request){
         $attributes = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required"],
        ]);

        $remember = $request->filled("remember");

        if (Auth::attempt($attributes, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended("/jobs");
        }

        throw ValidationException::withMessages([
            "email" => "The email or password is incorrect.",
        ]);
    }

}