<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Return register page view
     */
    public function index()
    {
        return view('auth.register');
    }

    /**
     * Creating user and redirect to homepage
     * @param  App\Http\Requests\RegisterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {
        $attr = $request->all();
        $attr['password'] = bcrypt($attr['password']);
        $attr['name'] = substr($request->email, 0, strpos($request->email, '@'));
        User::create($attr);
        return redirect('/login')->with('success-info', 'Register account Successfully');;
    }
}
