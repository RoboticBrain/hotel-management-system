<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Room;
use Illuminate\Http\Request as HttpRequest;
class BookingsController extends Controller
{
    public function index() {
        $bookings = Booking::with(['room','customer'])->get();
        return view('admin.dashboard.bookings.index',compact('bookings'));
    }
    public function edit(Booking $booking) {
        return view('admin.dashboard.bookings.edit',  $booking);
    }
    public function create() {
        $customers = Customer::orderBy('first_name')->get();
        $rooms = Room::where('status','available')->get();
        // dd($rooms->count());
        return view('admin.dashboard.bookings.create', compact('customers','rooms'));
    }
    public function store(HttpRequest $request) {
        $validated = $request->validate([
            'customer_id' => 'required',
            'room_number' => 'required',
            'check-in' => 'required|date',
            'check-out' => 'required|date',
        ]);
        $room_id = Room::where('room_number',$validated['room_number'])->get('id')[0]->id;
    
        Booking::create([
            'customer_id' => $validated['customer_id'],
            'room_id' => $room_id,
            'checked_in' => $validated['check-in'],
            'checked_out' => $validated['check-out'],
            'room_status' => 'Booked',
            'payment_status' => 'completed',
        ]);

       $updated =  Room::find($room_id)->update(['status'=> 'Booked']);
       if($updated){
            return redirect()->route('admin.show.bookings')->with('notification', ['type'=>'success','message'=> 'Booking created']);
       }
       else {
            return redirect()->back()->with('notification', ['type'=>'danger','message'=> 'Booking failed']);
       }
    }
    public function getStatus() {
        
    }
}
