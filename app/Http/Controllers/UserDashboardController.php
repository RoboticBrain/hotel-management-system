<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class UserDashboardController extends Controller
{

    public function home() {
        return 'Hi there';
    }
    public function getCustomerID() {
        return Auth::id();
    }
    
    public function getTodayDate() {
       return Carbon::today();
    }
    public function getActiveBookings() {
        $active_bookings = Booking::where('customer_id',$this->getCustomerID())->whereDate('checked_in', '<=',$this->getTodayDate())->whereDate('checked_out','>',$this->getTodayDate());
        return $active_bookings;
    }
    public function getCompleteBookings() {
        $completed_bookings = Booking::where('customer_id',$this->getCustomerID())->whereDate('checked_out','<=',$this->getTodayDate())->whereNull('cancelled_at');
        return $completed_bookings;
    }
    public function getCancelledBookings() {
        $cancelled_bookings = Booking::where('customer_id', $this->getCustomerID())->whereNotNull('cancelled_at');
        return $cancelled_bookings;
    }

  
    public function index() {
     
        $my_bookings = Booking::where('customer_id', $this->getCustomerID())->count();
        $completed_bookings = $this->getCompleteBookings()->count();
        $active_bookings = $this->getActiveBookings()->count();
        $upcoming_bookings = Booking::where('customer_id', $this->getCustomerID())->whereDate('checked_in','>', $this->getTodayDate())->count();
        $cancelled_bookings = $this->getCancelledBookings()->count();
        $bookings  = Booking::with('room')->where('customer_id',$this->getCustomerID())->whereNull('cancelled_at')->get();
        $totalAmountSpent = $this->getCompleteBookings()->get()->sum(function ($booking){
            $days = $booking->checked_in
                    ->copy()
                    ->startOfDay()
                    ->diffInDays($booking->checked_out->copy()->startOfDay()) + 1;
                    return (int) str_replace('$','',$booking->room->price) * (int)$days;
        });

        return view('user.dashboard.dashboard', compact(
            'my_bookings',
            'upcoming_bookings',
            'active_bookings',
            'cancelled_bookings',
            'totalAmountSpent',
            'completed_bookings'
        ));
    }
    public function active_bookings() {
        $totalPay = 0;
        $active_bookings = $this->getActiveBookings()->get();
       $this->getActiveBookings()->get()->sum(function ($booking) use ($totalPay){
            $totalPay += (int) str_replace('$','',$booking->room->price);
        });
        return view('user.dashboard.active_bookings', compact('active_bookings','totalPay'));
    }
    public function completed_bookings() {
        $completed_bookings = $this->getCompleteBookings()->get();
        return view('user.dashboard.completed_bookings', compact('completed_bookings'));
    }
    public function cancelled_bookings() {
        $cancelled_bookings = $this->getCancelledBookings()->get();
        return view('user.dashboard.cancelled_bookings',compact('cancelled_bookings'));
    }
}
