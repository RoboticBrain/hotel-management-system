<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Booking;

class AdminController extends Controller
{
    public function home() {
    
        return view('admin.dashboard.home');
    }
    public function dashboard() {
        $total_rooms = Room::count();
        $total_users = User::count();
        $total_bookings = Room::where('status','Booked')->count();
        $available_rooms = Room::where('status','Available')->count();

        return view('admin.dashboard.dashboard',compact(['total_rooms','total_users','total_bookings','available_rooms']));
    }
}
