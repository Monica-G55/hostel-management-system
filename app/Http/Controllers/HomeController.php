<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
{
    $currentHour = date('H');
    if ($currentHour < 12) {
        $welcome_string = 'Good Morning';
    } elseif ($currentHour < 18) {
        $welcome_string = 'Good Afternoon';
    } else {
        $welcome_string = 'Good Evening';
    }

    $username = auth()->user()->name;
    dd($welcome_string, $username);

    return view('dashboard', [
        'welcome_string' => $welcome_string,
        'username' => $username,
    ]);
}

}