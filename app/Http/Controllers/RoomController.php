<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $rooms = Room::all();
        return view('manage-rooms', compact('rooms'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('create-room');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'room_no' => 'required',
            'seater' => 'required|integer',
            'fees' => 'required|numeric',
        ]);

        $data = $request->all();
        $data['posting_date'] = now(); // Automatically set posting date

        Room::create($data);
        return redirect()->route('manage-rooms')->with('success', 'Room added successfully');
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $room = Room::findOrFail($id);
        return view('edit-room', compact('room'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $request->validate([
            'room_no' => 'required',
            'seater' => 'required|integer',
            'fees' => 'required|numeric',
           
        ]);
    
        $room = Room::findOrFail($id);
    
        $room->update([
            'room_no' => $request->input('room_no'),
            'seater' => $request->input('seater'),
            'fees' => $request->input('fees'),
            'posting_date' => now(),
        ]);
    
        return redirect()->route('manage-rooms')->with('success', 'Room updated successfully');
    }
    


    // Remove the specified resource from storage.
    public function destroy($id)
    {
        Room::destroy($id);
        return redirect()->route('manage-rooms')->with('success', 'Room deleted successfully');
    }
}
