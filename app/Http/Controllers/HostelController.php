<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HostelController extends Controller
{
    public function create()
    {
        return view('book-hostel');
    }
}
