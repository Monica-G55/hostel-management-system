<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    public function showChangePasswordForm()
    {
        return view('settings');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required|confirmed',
        ]);

        $user = Auth::user();
        
        // Check if the old password is correct
        if (!Hash::check($request->input('oldpassword'), $user->password)) {
            return redirect()->back()->withErrors(['oldpassword' => 'Current password does not match']);
        }

        // Update the password
        $user->password = Hash::make($request->input('newpassword'));
        $user->save();

        return redirect()->back()->with('status', 'Password has been changed');
    }
}
