<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin() {
        return view('admin.login');
    }

    public function showRegister() {
        return view('admin.register');
    }

    public function register(Request $request) {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed',
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        return redirect()->route('admin.login')->with('success','Registered successfully.');
    }

    public function login(Request $request) {
        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }
        return back()->with('error','Invalid login details');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
