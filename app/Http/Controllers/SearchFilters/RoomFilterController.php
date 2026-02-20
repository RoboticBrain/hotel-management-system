<?php

namespace App\Http\Controllers\SearchFilters;
use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomFilterController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
            'search' => 'nullable|string',
            'status' => 'nullable|in:Available,Booked',
            'room_type' => 'nullable|in:Single,Double,Deluxe',
            'min_price' => 'nullable|numeric|min:0',
            'max_price' => 'nullable|numeric|min:0',    
            
        ]);
    
        $query = Room::query();

        // Search by room number only if search exists
        $query->when($validated['search'], fn($q) =>
            $q->where('room_number', 'like', "%{$validated['search']}%")
        );

        // Status filter
        $query->when($validated['status'], fn($q) =>
            $q->where('status', $validated['status'])
        );

        // Room type filter
        $query->when($validated['room_type'], fn($q) =>
            $q->where('room_type', $validated['room_type'])
        );

        // Price range
       $query->when($validated['min_price'], function ($q) use ($validated) {
        $q->whereRaw("CAST(REPLACE(price, '$', '') AS DECIMAL) >= ?", [$validated['min_price']]);
        });
        $query->when($validated['max_price'], function ($q) use ($validated) {
        $q->whereRaw("CAST(REPLACE(price, '$', '') AS DECIMAL) <= ?", [$validated['max_price']  ]);
        });

        $rooms = $query->paginate(10)->withQueryString();

        return view('admin.dashboard.rooms.index', compact('rooms'));

        }
}
