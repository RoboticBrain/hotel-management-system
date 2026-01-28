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
        $no_of_room = Room::count();
        $no_of_users = User::count();
        $no_of_bookings = Booking::count();

        return view('admin.dashboard.dashboard',compact(['no_of_room','no_of_users','no_of_bookings']));
    }

    public function customers() {
    }
    public function bookings() {
        return view('admin.dashboard.bookings');
    }
}
