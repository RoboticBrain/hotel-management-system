<?php

namespace App\Http\Controllers;
use App\Mail\BookingConfirmed;
use Illuminate\Support\Facades\Mail;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Stripe\Stripe;
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
        if($validated['check_in'] == $validated['check_out']){
            return redirect()->back()->with('notification', ['type' => 'danger', 'message' => 'check in and check out date cannot be the same']);
        }

        $room_id = $room->id;
        $customer_id = Auth::user()->id;
    
        $booking = Booking::create([
            'room_id' => $room_id,
            'customer_id' => $customer_id,
            'checked_in' => $validated['check_in'],
            'checked_out' => $validated['check_out'],
            'room_status' => 'Booked',
            'payment_status' => 'pending',
        ]);

        
        if(!$booking){
            return redirect()->back()->with('notification', ['type' => 'danger','message' => 'Some error occured' ]);
        }
        return $this->stripe_session($room, $booking);


    }
    public function stripe_session(Room $room, Booking $booking) {
        // dd('in stripe session');
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => ucfirst($room->room_type) . ' Bed Room',
                    ],
                    'unit_amount' => (int)str_replace('$','',$room->price) * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('payment.success', $booking) . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('payment.cancel',$booking). '?session_id={CHECKOUT_SESSION_ID}',
            ]);
    
        return redirect($session->url);

    }
    public function available_rooms() {
        $available_rooms = Room::where('status','Available')->get();
        return view('user.dashboard.rooms.available', compact('available_rooms'));
    }
    public function booked_rooms() {
        $booked_rooms = Room::where('status','Booked')->get();
        return view('admin.dashboard.booked_rooms', compact('booked_rooms'));
    }
}

