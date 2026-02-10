<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
class MyBookingController extends Controller
{
    public function index() {
        $user_id = auth()->user()->id;
        $user_bookings = Booking::where('customer_id',$user_id)->get();
        return view('user.dashboard.bookings.index', compact('user_bookings'));
    }
}
