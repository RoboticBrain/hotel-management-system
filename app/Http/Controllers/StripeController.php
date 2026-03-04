<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use Stripe\Stripe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmed;
class StripeController extends Controller
{
    public function index(Booking $booking) {
        return view('stripe.index', compact('booking'));
    }
 
    public function success( Booking $booking, Request $request,) {
        // dump('here in success');
    
        $session_id = $request->query('session_id');
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $session = \Stripe\Checkout\Session::retrieve($session_id);
        if($session->payment_status === 'paid'){
            Booking::where('id', $booking->id)->update(['payment_status' => 'paid']);
            $room = $booking->room;
            $room->status = 'Booked';
            $room->save();
            Mail::to($booking->customer->user->email)->send(new BookingConfirmed($booking));
            return redirect()->route('user.show.rooms')->with('notification', ['type' => 'success','message' => 'Booking confirmed. Please check your email.' ]);

        } else {
            return 'Payment verification failed.';
        }
    }
    public function cancel(Request $request, Booking $booking) {
        $session_id = $request->query('session_id');
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $session = \Stripe\Checkout\Session::retrieve($session_id);
        if($session->payment_status === 'unpaid'){
        $booking->payment_status = 'unpaid';
        $booking->save();
        $booking->room->status = 'Available';
        $booking->room->save();
        return redirect()->back()->with('notification', ['type' => 'warning','message' => 'Payment cancelled, booking not completed' ]);

        }
    }
}