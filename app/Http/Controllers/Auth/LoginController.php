<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Return login page view
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Login user and redirect to homepage
     * @param  App\Http\Requests\LoginRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        if (Auth::attempt(['email' => request('email'), 'password' => $request->password], $request->remember)) {
            return redirect('/')->with('success-info', 'Login Successfully');
        }

        return redirect('/login')->with('error', 'Invalid Credential');
    }

    /**
     * Logout acocunt
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success-info', 'Logout Successfully');
    }
}
