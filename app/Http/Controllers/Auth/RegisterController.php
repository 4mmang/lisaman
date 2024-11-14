<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'unique:users,username'],
            'email' => ['required', 'unique:users,email'],
            'password' => ['required'],
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $credentials = $request->only(['username', 'password']);
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }
    }
}
