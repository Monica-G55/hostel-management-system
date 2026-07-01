<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\UserRegistration;
use Illuminate\Support\Facades\DB;
class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');

    }

    public function showStudentLoginForm()
    {
        return view('auth.studentlogin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        $admin = Admin::where('username', $credentials['username'])
                      ->orWhere('email', $credentials['username'])
                      ->first();

        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            Auth::guard('admin')->login($admin);
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

public function studentlogin(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $student = UserRegistration::where('email', $request->email)->first();

    if ($student && $student->password == $request->password) {

        Auth::guard('student')->login($student);

        DB::table('userlogs')->insert([
            'userId'     => $student->id,
            'userEmail'  => $student->email,
            'loginTime'  => now(),
        ]);

        return redirect()->route('student.dashboard');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
