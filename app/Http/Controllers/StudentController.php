<?php 
namespace App\Http\Controllers;

use App\Models\UserRegistration; 
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function create()
    {
        return view('register-students');
    }

    public function index()
    {
        $students = UserRegistration::all(); 
        return view('view-students', compact('students'));
    }

    public function manage()
    {
        $students = UserRegistration::all(); 
        return view('manage-students', compact('students')); 
    }

    public function destroy($id)
    {
        $student = UserRegistration::findOrFail($id); 
        $student->delete();
        return redirect()->route('view-students')->with('success', 'Record has been deleted');
    }
}
