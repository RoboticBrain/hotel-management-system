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
        $bookings = Booking::all(); // get all bookings
    $status_counts = [
        'confirmed' => 0,
        'pending' => 0,
        'cancelled' => 0,
    ];

    foreach ($bookings as $booking) {
        $status = $booking->status; // virtual attribute
        if (isset($status_counts[$status])) {
            $status_counts[$status]++;
        }
    }
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
