<?php

namespace App\Http\Controllers\SearchFilters;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class BookingsFilterController extends Controller
{
    public function index(Request $request) {
        $validated = $request->validate([
            'search' => 'nullable|string',
            'status' => 'nullable|string',
            'room_type' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);
        $query = Booking::query();
        $search = trim($validated['search'] ?? '');
        $query->when($search, fn($q) =>
               $q->whereHas('customer', fn($c) => 
                   $c->where('first_name', 'like', "%{$search}%")
               )
               ->orWhereHas('room', fn($r) => 
                   $r->where('room_number', 'like', "%{$search}%")
               )
            );
        $query->when($validated['start_date'], fn($q) =>
            $q->where('checked_in', '>=', $validated['start_date'])
        );
        $query->when($validated['end_date'], fn($q) =>
            $q->where('checked_out', '<=', $validated['end_date'])
        );
        $query->when($validated['room_type'], fn($q) =>
            $q->whereHas('room', fn($r) =>
            $r->whereRaw('LOWER(room_type) = ?', [strtolower($validated['room_type'])])
            )
        );
        return view('admin.dashboard.bookings.index', [
            'bookings' => $query->paginate(10)->withQueryString(),
        ]);
    }
    
}
