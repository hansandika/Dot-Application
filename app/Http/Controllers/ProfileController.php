<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display profile page
     * @return User
     */
    public function index()
    {
        $user = Auth::user();
        return view('profile.index', compact("user"));
    }

    /**
     * Update user information.
     *
     * @param  \Illuminate\Http\UpdateProfileRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request)
    {
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
        return redirect('/profile')->with('success-info', 'Update profile Successfully');
    }
}
