<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = Auth::user();
        $user->email = $request->input('email');
        $user->updation_date = now(); // Update the timestamp
        $user->save();

        return redirect()->route('profile')->with('success', 'Email updated successfully!');
    }
}
