<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Registering user 
     * @param  App\Http\Requests\RegisterRequest  $request
     * @return User and token
     */
    public function register(RegisterRequest $request)
    {
        $attr = $request->all();
        $attr['password'] = bcrypt($attr['password']);
        $attr['name'] = substr($request->email, 0, strpos($request->email, '@'));

        $user = null;
        try {
            $user = User::create($attr);
            $token = $user->createToken('UserToken')->plainTextToken;

            $response = [
                'status' => 201,
                'data' => $user,
                'token' => $token
            ];
            return response()->json($response, 201);
        } catch (Exception $e) {
            report($e);
            return response()->json(['error' =>  $e->getMessage()], 500);
        }
    }

    /**
     * Login user 
     * @param  App\Http\Requests\LoginRequest  $request
     * @return User and token
     */
    public function login(LoginRequest $request)
    {
        try {
            $user = User::where('email', $request->email)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                $response = [
                    'message' => 'Invalid credentials'
                ];
                return response()->json($response, 401);
            }
            $token = $user->createToken('UserToken')->plainTextToken;
            $response = [
                'status' => 200,
                'data' => $user,
                'token' => $token,
            ];
            return response()->json($response, 200);
        } catch (Exception $e) {
            report($e);
            return response()->json(['error' =>  $e->getMessage()], 500);
        }
    }

    /**
     * Logout user 
     * @return message
     */
    public function logout()
    {
        try {
            auth()->user()->tokens()->delete();
            $response = [
                'status' => 200,
                'message' => 'Logged out',
            ];
            return response()->json($response, 200);
        } catch (Exception $e) {
            report($e);
            return response()->json(['error' =>  $e->getMessage()], 500);
        }
    }
}
