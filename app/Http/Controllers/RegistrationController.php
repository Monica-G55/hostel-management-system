<?php
// app/Http/Controllers/RegistrationController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Room;
use App\Models\Registration;


class RegistrationController extends Controller
{
    public function create()
    {
        // Fetch rooms and courses from the database to populate the form
        $rooms = DB::table('rooms')->get();
        $courses = DB::table('courses')->get();
        return view('book-hostel', compact('rooms', 'courses'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Registration::create($input);
        return redirect()->back()->with('success', 'Registration completed successfully.');
    }


    //  ajax

    public function getSeater(Request $request)
    {
        $roomId = $request->input('roomid');
        $seater = Room::where('room_no', $roomId)->value('seater');

        if ($seater === null) {
            return response()->json(['error' => 'Room not found'], 404);
        }

        return response()->json($seater);
    }

    public function getFpm(Request $request)
    {
        $roomId = $request->input('rid');
        $fpm = Room::where('room_no', $roomId)->value('fees');

        if ($fpm === null) {
            return response()->json(['error' => 'Room not found'], 404);
        }

        return response()->json($fpm);
    }

    public function checkAvailability(Request $request)
    {
        $roomNo = $request->input('roomno');
        $availabilityStatus = Room::where('room_no', $roomNo)->value('availability_status');

        if ($availabilityStatus === null) {
            return response()->json(['error' => 'Room not found'], 404);
        }

        return response()->json($availabilityStatus ? 'Available' : 'Not Available');
    }

    public function getAmount(Request $request)
    {
        $duration = $request->input('userinfo');
        $amount = DB::table('amounts')
            ->where('duration', $duration)
            ->value('amount');

        if ($amount === null) {
            return response()->json(['error' => 'Amount not found'], 404);
        }

        return response()->json($amount);
    }

    // ajax end
    public function index()
    {
        $registrations = DB::table('registrations')->get();
        return view('manage-students', compact('registrations'));
    }

    public function show($id)
    {
        $registration = DB::table('registrations')->where('id', $id)->first();

        if ($registration) {
            return view('students-profile', compact('registration'));
        } else {
            return abort(404, 'Record not found');
        }
    }

    public function destroy($id)
    {
        $deleted = DB::table('registrations')->where('id', $id)->delete();

        if ($deleted) {
            return redirect()->route('manage-students')->with('success', 'Record has been deleted');
        } else {
            return redirect()->route('manage-students')->with('error', 'Record not found');
        }
    }
}
