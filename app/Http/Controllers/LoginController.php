<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AuthenticateRequest;


class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function authenticate(AuthenticateRequest $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('menu');
        }
    
        return back()->withErrors([
            'email' => 'Login/senha inválido',
        ])->onlyInput('email');
    }
}
