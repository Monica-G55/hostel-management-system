<?php
namespace App\Http\Controllers;

use App\Models\UserRegistration;
use App\Models\Room;
use App\Models\Registration;
use App\Models\Course;
use App\Models\UserLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $studentCount = UserRegistration::count();
        $roomCount = Room::count();
        $bookedCount = Registration::count();
        $courseCount = Course::count();

        $userLogs = UserLog::orderBy('loginTime', 'desc')->get();

        return view('dashboard', compact('user', 'studentCount', 'roomCount', 'bookedCount', 'courseCount', 'userLogs'));
    }

    public function studentIndex()
    {
         $user = Auth::user();

        $studentCount = UserRegistration::count();
        $roomCount = Room::count();
        $bookedCount = Registration::count();
        $courseCount = Course::count();

        $userLogs = UserLog::orderBy('loginTime', 'desc')->get();

        return view('students.dashboard', compact('user', 'studentCount', 'roomCount', 'bookedCount', 'courseCount', 'userLogs'));
    }
}
