
@extends('layouts.app')

@section('title', 'Active Bookings')
@section('selection', 'Active Bookings')

@section('content')

<div class="container py-5">
    @if($active_bookings->count() < 1)
        <h3 class="text-white mb-4 badge bg-danger fs-4 rounded">No Active Bookings so far</h3>
    @else
        <div class="row g-4">

            <div class="col-md-6 col-lg-4">
                @foreach ($active_bookings as $booking )
                
    
                <div class="booking-card">

                    <!-- Room Image -->
                    <img src="{{ asset('storage/'. $booking->room->image ) }}"
                        class="w-100 booking-img"
                        alt="Room Image">

                    <div class="p-4">

                        <!-- Header -->
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="mb-0 fw-bold">{{ $booking->room->room_type }} Bed Room</h5>
                            <span class="status-badge status-active">ACTIVE</span>
                        </div>
                        <!-- Stay Info -->
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
                <div class="text-end">
                    <div class="small text-secondary">Per Night</div>
                    <div class="fw-semibold fs-6 text-light">{{ $booking->room->price }}</div>
                </div>

                <div class="price-divider my-2"></div>

                <div class="text-end">
                    <div class="small text-secondary">Total</div>
                    <div class="fw-bold fs-5 text-success">${{ (int)$totalDays * (int)str_replace('$','',$booking->room->price) }}</div>
                </div>
    </div>

                        </div>

                        <!-- Price Section -->
                        
                    
                    </div>
                </div>
                      @endforeach
        </div>
        @endif

    </div>
</div>

@endsection
<style>
    body {
        background-color: #1f2937; /* dark gray background */
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
    color: #000; /* text stays black */
    }
 .status-completed {
    background-color: #198754; /* same as Bootstrap text-success */
    color: #000;
}
    .booking-info li {
        margin-bottom: 6px;
        font-size: 14px;
        color: #cbd5e1;
    }

    .booking-price {
        background: rgba(255,255,255,0.05);
        padding: 12px;
        border-radius: 12px;
        margin-top: 10px;
    }

    .btn-modern {
        border-radius: 50px;
        padding: 6px 18px;
        font-size: 13px;
        font-weight: 500;
    }
</style>