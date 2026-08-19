<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
class RegisteredUsersController extends Controller
{
    //

    public function create(){
        
        return view("auth.register");
    }
    public function store(Request $request){
    $attributes=request()->validate([
        "name" => ["required"],
        "email" => ["required", "email", "unique:users,email"],
        "password" => ["required", "confirmed", "min:8",'confirmed'],
    ]);
    $user =User::create($attributes);
        
        return redirect('login');
    }
}