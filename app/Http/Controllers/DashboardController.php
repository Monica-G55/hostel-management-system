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
        // Fetch authenticated user
        $user = Auth::user();

        // Example queries to fetch data; adjust as needed
        $studentCount = UserRegistration::count();
        $roomCount = Room::count();
        $bookedCount = Registration::count();
        $courseCount = Course::count();

        // Fetch user logs, ordered by login time
        $userLogs = UserLog::orderBy('loginTime', 'desc')->get();

        // Pass data to the view
        return view('dashboard', compact('user', 'studentCount', 'roomCount', 'bookedCount', 'courseCount', 'userLogs'));
    }
}
