<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('gigan.admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'=>'email|required',
            'password'=>'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            if(Auth::user()->role === 'admin'){
                return redirect()->intended(route('admin.gigan.dashboard'));
            }
            Auth::logout();
               return redirect()->route('gigan.admin.auth.login');
        }
        return back()->withErrors([
            'login'=>'Admin Only'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/gigan-login');
    }
}
