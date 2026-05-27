<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRegistration;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserRegistrationController extends Controller
{
    public function showForm()
    {
        $admin = Auth::user(); // Ensure the user is authenticated
        return view('register-student', compact('admin'));
    }


    public function register(Request $request)
    {
        $input = $request->all();
        UserRegistration::create($input);
        return redirect('/register-student')->with('status', 'Student has been Registered!');
    }

    public function viewAllStudents()
    {
        $registrations = UserRegistration::all();
        $admin = Auth::user(); // Ensure the user is authenticated
        return view('view-students', compact('registrations', 'admin'));
    }

    public function viewStudent($id)
    {
        $registration = UserRegistration::findOrFail($id);
        $admin = Auth::user(); // Ensure the user is authenticated
        return view('view-student', compact('registration', 'admin'));
    }

    public function destroy($id)
    {
        $registration = UserRegistration::findOrFail($id);
        $registration->delete();
        return redirect()->route('view-students')->with('status', 'Student account has been deleted!');
    }
}
