<?php

namespace App\Http\Controllers;
use App\Models\Room;
use App\Models\User;
use App\Models\Booking;
use Carbon\Carbon;
class AdminController extends Controller
{
    public function home() {
    
        return view('admin.dashboard.home');
    }
    public function getTodayBookings() {
        $today_bookings = Booking::whereDate('created_at',today()->now());
        return $today_bookings;
    }
    public function getPaidBookings() {
        $paid_bookings = Booking::where('payment_status','paid');
        return $paid_bookings;
    }
    public function dashboard() {
        $roomStats = Room::selectRaw("
        COUNT(*) as total,
        SUM(status = 'Booked') as booked,
        SUM(status = 'Available') as available
        ")->first();
        $total_rooms_available = Room::where('status','Available')->count();
        $total_bookings = Booking::count(); // get all bookings
        $todays_booking = $this->getTodayBookings()->get()->count();
        $paid_bookings = $this->getPaidBookings()->get();
        $monthly_bookings = Booking::whereMonth('created_at', now()->month)->count();
        $total_users = User::count();
        $total_revenue = 0;
        foreach($paid_bookings as $booking){
            $check_in = $booking->checked_in;
            $check_out = $booking->checked_out;
            $days = $check_in->diffInDays($check_out);
            $total_revenue += floatval($days) * floatval(str_replace('$', '', $booking->room->price));
        }
        return view('admin.dashboard.dashboard',compact(['roomStats','total_users','total_rooms_available','todays_booking','monthly_bookings','total_revenue']));
    }
    public function available_rooms() {
        $available_rooms = Room::where('status','Available')->get();
        return view('admin.dashboard.available_rooms', compact('available_rooms'));
    }
    public function booked_rooms() {
        $booked_rooms = Room::where('status','Booked')->get();
        return view('admin.dashboard.booked_rooms', compact('booked_rooms'));
    }
    public function today_bookings() {
        $todaysBooking = $this->getTodayBookings()->get();
        return view('admin.dashboard.reports.today_booking', compact('todaysBooking'));    
    }
    public function total_revenue() {
        $bookings = $this->getPaidBookings()->get();
        $fourDaysAgo = Carbon::today()->subDays(4)->toDateString();
        $revenueByDay = Booking::whereDate('checked_in', '>=', $fourDaysAgo)
                   ->orderBy('created_at', 'desc')
                   ->get();
            return view('admin.dashboard.reports.total_revenue', compact('bookings','revenueByDay'));
        }
    }