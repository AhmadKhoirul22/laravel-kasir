<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
class Auth_Controller extends Controller
{
    public function index(){
        return view('login',['title' => 'Login Page']);
    }

    public function auth(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            if (!User::where('email', $credentials['email'])->exists()) {
                return back()->with('success', 'Email tidak terdaftar.');
            }
            return back()->with('success', 'Password salah.');
        }

        return redirect()->route('dashboard')->with('success', 'Login berhasil!');
    }
}
