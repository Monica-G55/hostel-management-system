<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('manage-courses', compact('courses'));
    }

    public function create()
    {
        return view('create-course');
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_fn' => 'required|string|max:255',
            'course_sn' => 'required|string|max:255',
            'course_code' => 'required|string|max:255',

        ]);

        $data = $request->all();
        $data['posting_date'] = now(); // Automatically set posting date

        Course::create($data);



        return redirect()->route('manage-courses')->with('success', 'Course added successfully.');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('course-edit', compact('course'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'course_fn' => 'required|string|max:255',
            'course_sn' => 'required|string|max:255',
            'course_code' => 'required|string|max:255',
        ]);
    
        $course = Course::findOrFail($id);
    
        // Update the course, including setting the posting_date to the current date
        $course->update([
            'course_fn' => $request->input('course_fn'),
            'course_sn' => $request->input('course_sn'),
            'course_code' => $request->input('course_code'),
            'posting_date' => now(), // Set posting_date to the current date and time
        ]);
    
        return redirect()->route('manage-courses')->with('success', 'Course updated successfully.');
    }
    
    public function destroy($id)
    {
        Course::destroy($id);
        return redirect()->route('manage-courses')->with('success', 'Course deleted successfully.');
    }
}
