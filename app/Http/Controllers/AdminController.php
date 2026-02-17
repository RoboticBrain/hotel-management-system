<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;

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
    public function available_rooms() {
        $available_rooms = Room::where('status','Available')->get();
        return view('admin.dashboard.available_rooms', compact('available_rooms'));
    }
    public function booked_rooms() {
        $booked_rooms = Room::where('status','Booked')->get();
        return view('admin.dashboard.booked_rooms', compact('booked_rooms'));
    }
}
