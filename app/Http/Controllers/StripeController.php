<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use Stripe\Stripe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmed;
use App\Models\Payment;

class StripeController extends Controller
{
    /**
     * Set the Stripe API key from config and validate presence.
     *
     * @return void
     * @throws \RuntimeException if key is missing
     */
    protected function setStripeKey(): void
    {
        $key = config('services.stripe.secret');
        if (empty($key)) {
            throw new \RuntimeException('Stripe secret key is not configured. ' .
                'Please add STRIPE_SECRET to your .env and run config:clear.');
        }

        Stripe::setApiKey($key);
    }

    public function index() {
        $payments = Payment::all();
        return view('admin.dashboard.payments.index', compact('payments'));
    }
    public function checkout(Booking $booking){
        $userRoom = new UserRoomController();
        $redirect_url = $userRoom->stripe_session($booking); 
        return $redirect_url;
    } 
    public function success( Booking $booking, Request $request,) {
        // dump('here in success');
    
        $session_id = $request->query('session_id');
        $this->setStripeKey();
        $session = \Stripe\Checkout\Session::retrieve($session_id);
        $paymentIntent = \Stripe\PaymentIntent::retrieve($session->payment_intent);
        // dd($paymentIntent->id, $session->id,$paymentIntent->amount / 100, $paymentIntent->currency, $paymentIntent->status, $paymentIntent->latest_charge);
        if($session->payment_status === 'paid'){
            Booking::where('id', $booking->id)->update(['payment_status' => 'paid']);
            $room = $booking->room;
            $room->status = 'Booked';
            $room->save();
            $booking->payment()->create([
                'stripe_session_id' => $session->id,
                'payment_intent_id' => $paymentIntent->id,
                'amount' => $paymentIntent->amount / 100, // Convert from cents to dollars
                'currency' => strtoupper($paymentIntent->currency),
                'status' => $paymentIntent->status === 'succeeded' ? 'Paid' : 'Failed',
            ]);

            Mail::to($booking->customer->user->email)->send(new BookingConfirmed($booking));
            return redirect()->route('user.show.rooms')->with('notification', ['type' => 'success','message' => 'Booking confirmed. Please check your email.' ]);

        } else {
            return 'Payment verification failed.';
        }
    }
    public function cancel(Request $request, Booking $booking) {
        $session_id = $request->query('session_id');
        $this->setStripeKey();
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