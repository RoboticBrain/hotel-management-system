@extends('layouts.app')

@section('title', 'Active Bookings')
@section('selection', 'Active Bookings')

@section('content')

<div class="container py-5">
    @if($active_bookings->count() < 1)
        <h3 class="text-white mb-4 badge bg-danger fs-4 rounded">No Active Bookings so far</h3>
    @else
        <h3 class="mb-4 text-white">Active Bookings</h3>

        <div class="row g-4">
            @foreach ($active_bookings as $booking)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-lg rounded-4 booking-card"
                         style="transition: transform 0.3s, box-shadow 0.3s;">

                        <!-- Room Image -->
                        <img src="{{ asset('storage/' . $booking->room->image) }}" 
                             class="w-100 booking-img" 
                             alt="Room Image">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h5 class="mb-0 fw-bold">{{ ucfirst($booking->room->room_type) }} Bed Room</h5>
                                <span class="status-badge status-active">ACTIVE</span>
                            </div>
                            @php
                                $checkIn  = $booking->checked_in->startOfDay();
                                $checkOut = $booking->checked_out->startOfDay();
                                $totalDays = $checkIn->diffInDays($checkOut) + 1;
                            @endphp
                            <div class="d-flex justify-content-between align-items-end">
                                <ul class="list-unstyled mt-3 booking-info">
                                    <li><strong>Check-in:</strong> {{ $booking->checked_in->format('d M Y') }}</li>
                                    <li><strong>Check-out:</strong> {{ $booking->checked_out->format('d M Y') }}</li>
                                    <li><strong>Total Days:</strong> {{ $totalDays }}</li>
                                    <li><strong>Remaining:</strong> {{ Carbon\Carbon::today()->diffInDays($checkOut) }}</li>
                                </ul>
                            <div class="price-box ms-3">
                                      <div class="mt-3">
                                <div class="text-end">
                                    <div class="small text-secondary">Per Night</div>
                                    <div class="fw-semibold fs-6 text-light">{{ $booking->room->price }}</div>
                                </div>
                                <div class="text-end">
                                    <div class="small text-secondary">Total</div>
                                    <div class="fw-bold fs-5 text-success">
                                        ${{ (int)$totalDays * (int)str_replace('$','',$booking->room->price) }}
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

@endsection

<style>
body {
    background-color: #1f2937;
}

.booking-card {
    background: linear-gradient(145deg, #2b3545, #232b38);
    border: 1px solid rgba(255,255,255,0.05);
    border-radius: 20px;
    overflow: hidden;
    transition: all 0.3s ease;
    box-shadow: 0 10px 25px rgba(0,0,0,0.3);
    color: #fff;
}

.booking-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 18px 40px rgba(0,0,0,0.5);
}

.booking-img {
    height: 180px;
    object-fit: cover;
    border-bottom: 1px solid rgba(255,255,255,0.1);
}

.status-badge {
    padding: 6px 14px;
    font-size: 12px;
    border-radius: 50px;
    font-weight: 600;
    letter-spacing: 1px;
}

.status-active {
    background: linear-gradient(45deg, #0d6efd, #0b5ed7);
    color: #fff;
}

.booking-info li {
    margin-bottom: 6px;
    font-size: 14px;
    color: #cbd5e1;
}

.price-divider {
    border-top: 1px dashed rgba(255,255,255,0.2);
    margin: 5px 0;
}
</style>
