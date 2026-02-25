<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Room;
use Illuminate\Http\Request;
class BookingsController extends Controller
{
    public function index() {
        $bookings = Booking::with(['room','customer'])->get();
        return view('admin.dashboard.bookings.index',compact('bookings'));
    }
    public function edit(Booking $booking) {
        if($booking->customer_status == 'Checked_out' || $booking->customer_status == 'Cancelled'){
            return redirect()->back()->with('notification',['type'=>'danger','message' => 'Cannot edit. ']);
        }
        return view('admin.dashboard.bookings.edit', compact('booking'));
    }
    public function update(Booking $booking, Request $request) {
        $validated = $request->validate([
            'check_in' => 'required|date',
            'check_out' => 'required|date',
        ]);

       $success = $booking->update([
            'checked_in' => $validated['check_in'],
            'checked_out' => $validated['check_out'],
       ]);
       if(!$success){
            return redirect()->back()->with('notification', ['type'=>'danger', 'message' => 'Booking failed to update']);
       }
        return redirect()->route('admin.show.bookings')->with('notification', ['type'=>'success', 'message' => 'Booking updated successfully']);
        
    }
    public function create() {
        $customers = Customer::orderBy('first_name')->get();
        $rooms = Room::where('status','available')->get();
        // dd($rooms->count());
        return view('admin.dashboard.bookings.create', compact('customers','rooms'));
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'customer_id' => 'required',
            'room_number' => 'required',
            'check_in' => 'required|date',
            'check_out' => 'required|date',
        ]);
        $room_id = Room::where('room_number',$validated['room_number'])->get('id')[0]->id;
    
        Booking::create([
            'customer_id' => $validated['customer_id'],
            'room_id' => $room_id,
            'checked_in' => $validated['check_in'],
            'checked_out' => $validated['check_out'],
            'room_status' => 'Booked',
            'payment_status' => 'paid',
        ]);

       $updated =  Room::find($room_id)->update(['status'=> 'Booked']);
       if($updated){
            return redirect()->route('admin.show.bookings')->with('notification', ['type'=>'success','message'=> 'Booking created']);
       }
    }
    public function destroy(Booking $booking) { 
        if($booking->customer_status == 'Checked_out' || $booking->customer_status == 'Checked_in'){
            return redirect()->back()->with('notification',['type'=>'danger','message' => 'Cannot cancel. Customer already checked in']);
        }
        $booking->cancelled_at = now();
        $booking->save();
        // dd($booking->cancelled_at);
        return redirect()->route('admin.show.bookings')->with('notification',['type'=> 'success','message' => 'Booking cancelled successfully']);
      
    }

}
