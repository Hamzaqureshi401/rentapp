<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Reservation;
use App\Models\Ship;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $myShips = Ship::get();
        $availableSkippers = \App\Models\Skipper::get();
        $users = \App\Models\User::whereNotIn('role', ['super_admin'])->get();


        return view('home' , compact('myShips' , 'availableSkippers', 'users'));
    }
}
