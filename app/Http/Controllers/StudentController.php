<?php 
namespace App\Http\Controllers;

use App\Models\UserRegistration; // Import the correct model
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Show the form for registering a new student
    public function create()
    {
        return view('register-students');
    }

    // Display a listing of students
    public function index()
    {
        $students = UserRegistration::all(); // Fetch all students
        return view('view-students', compact('students')); // Pass students to the view
    }

    // Display a view for managing students (if needed)
    public function manage()
    {
        $students = UserRegistration::all(); // Fetch all students
        return view('manage-students', compact('students')); // Pass students to the view
    }

    // Delete a specific student record
    public function destroy($id)
    {
        $student = UserRegistration::findOrFail($id); // Find the student or fail
        $student->delete(); // Delete the student record
        return redirect()->route('view-students')->with('success', 'Record has been deleted'); // Redirect with success message
    }
}
