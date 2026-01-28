<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Room;
class BookingsController extends Controller
{
    public function index() {
        $bookings = Room::with('customers')->get();
        // foreach($bookings as $booking){
        //     echo $booking;
        //     echo "<hr>";
        // }

        // dd($bookings);
        return view('admin.dashboard.bookings.index',compact('bookings'));
    }
    public function edit(Booking $booking) {
        return view('admin.dashboard.bookings.edit',  $booking);
    }
    public function create() {
        $customers = Customer::orderBy('first_name')->get();
        $rooms = Room::where('status','available')->get();
        return view('admin.dashboard.bookings.create', compact('customers','rooms'));
    }
}
