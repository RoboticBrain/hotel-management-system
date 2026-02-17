<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserRoomController extends Controller
{
    public function index() {
        $available_rooms = Room::all();
        return view('user.dashboard.rooms.index', compact('available_rooms'));
    }
    public function create(Room $room){
        return view('user.dashboard.rooms.create', compact('room'));
    }
    public function store(Room $room, Request $request) {
        $validated = $request->validate([
            'check_in' => 'required|date',
            'check_out' => 'required|date',
        ]);
        $room_id = $room->id;
        $customer_id = Auth::user()->id;
    
        $updated = Booking::create([
            'room_id' => $room_id,
            'customer_id' => $customer_id,
            'checked_in' => $validated['check_in'],
            'checked_out' => $validated['check_out'],
            'room_status' => 'Booked',
            'payment_status' => 'paid',
        ]);

        if(!$updated){
            return redirect()->back()->with('notification', ['type' => 'danger','message' => 'Some error occured' ]);
        }
        $room->status = 'Booked';
        $room->save();
        
        return redirect()->back()->with('notification', ['type' => 'success','message' => 'Room booked successfully' ]);

   
    }
}

