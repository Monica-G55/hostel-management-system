<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminController extends Controller
{
    // Show profile form
    public function showProfile()
    {
        $user = Auth::guard('admin')->user(); // Use 'admin' guard to get the authenticated user
        if (!$user) {
            return redirect()->route('login')->withErrors(['error' => 'You need to log in.']);
        }
        return view('profile', compact('user'));
    }

    // Handle profile update
    public function updateProfile(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:admins,email,' . Auth::guard('admin')->id(),
        ]);

        $user = Auth::guard('admin')->user(); // Use 'admin' guard to get the authenticated user
        if (!$user) {
            return redirect()->route('login')->withErrors(['error' => 'You need to log in.']);
        }
        $user->email = $request->input('email');
        $user->updation_date = now(); // Update the date of modification
        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }

    // Show settings form
    public function showSettings()
    {
        $user = Auth::guard('admin')->user(); // Use 'admin' guard to get the authenticated user
        if (!$user) {
            return redirect()->route('login')->withErrors(['error' => 'You need to log in.']);
        }
        return view('settings', compact('user'));
    }

    // Show change password form
    public function showChangePasswordForm()
    {
        $user = Auth::guard('admin')->user();
        return view('change-password', compact('user'));
    }

    // Handle change password request
    public function changePassword(Request $request)
    {
        $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required|confirmed',
        ]);

        $user = Auth::guard('admin')->user();

        if (!Hash::check($request->oldpassword, $user->password)) {
            return redirect()->back()->with('error', 'Current Password does not match');
        }

        $user->password = Hash::make($request->newpassword);
        $user->updation_date = now(); // Update the date of modification
        $user->save();

        return redirect()->route('settings')->with('success', 'Password has been changed');
    }
}
