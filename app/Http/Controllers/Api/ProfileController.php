<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display user information
     * @return User
     */
    public function index()
    {
        try {
            $user = Auth::user();
            $response = [
                'data' => $user,
                'status' => 200,
            ];
            return response()->json($response, 200);
        } catch (Exception $e) {
            report($e);
            return response()->json(['error' =>  $e->getMessage()], 500);
        }
    }

    /**
     * Update user information.
     *
     * @param  \Illuminate\Http\UpdateProfileRequest $request
     * @return \Illuminate\Http\Response $user
     */
    public function update(UpdateProfileRequest $request)
    {
        try {
            $user = Auth::user();
            $attr = $request->all();
            $attr['dob'] = date('Y-m-d',  strtotime($request->dob));
            $attr['password'] = bcrypt($attr['password']);

            if ($request->file('image')) {
                if ($user->profile_image) {
                    Storage::disk('public')->delete('profile-pictures/' . $user->profile_image);
                }

                $file = $request->file('image');
                $fileName = date('YmdHi') . $file->getClientOriginalName();
                $filePath = 'profile-pictures';
                Storage::disk('public')->putFileAs($filePath, request('image'), $fileName);
                $attr['profile_image'] = $fileName;
            }

            $user->update($attr);

            $response = [
                'data' => $user,
                'status' => 200,
                'message' => 'Update user successfull'
            ];
            return response()->json($response, 200);
        } catch (Exception $e) {
            report($e);
            return response()->json(['error' =>  $e->getMessage()], 500);
        }
    }
}
