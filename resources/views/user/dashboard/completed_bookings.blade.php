@extends('layouts.app')

@section('title', 'Completed Bookings')
@section('selection', 'Completed Bookings')

@section('content')

<div class="container py-5">
    @if($completed_bookings->count() < 1)
            <ul class="list-unstyled text-secondary">
                <li class="mb-2 text-danger"><i class="bi bi-x-circle-fill me-2 text-danger"></i>No completed bookings found for your account.</li>
    @else
        <h3 class="mb-4 text-white">Completed Bookings</h3>

        <div class="row g-4">
            @foreach ($completed_bookings as $booking)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-lg rounded-4 booking-card"
                         style="transition: transform 0.3s, box-shadow 0.3s;">

                        <!-- Room Image -->
                        <img src="{{ asset('storage/' . $booking->room->image) }}" 
                             class="w-100 booking-img" 
                             alt="Room Image">

                        <div class="card-body p-4">

                            <!-- Header -->
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h5 class="mb-0 fw-bold">{{ ucfirst($booking->room->room_type) }} Bed Room</h5>
                                <span class="status-badge status-completed">COMPLETED</span>
                            </div>

                            <!-- Stay Info -->
                            @php
                                $checkIn  = $booking->checked_in->startOfDay();
                                $checkOut = $booking->checked_out->startOfDay();
                                $totalDays = $checkIn->diffInDays($checkOut);
                            @endphp

                            <ul class="list-unstyled mt-3 booking-info">
                                <li><strong>Checked in:</strong> {{ $booking->checked_in->format('d M Y') }}</li>
                                <li><strong>Checked out:</strong> {{ $booking->checked_out->format('d M Y') }}</li>
                                <li><strong>Total Stays:</strong> {{ $totalDays }}</li>
                            </ul>
                            
                            <div class="text-end mt-3">
                                <div class="small text-secondary">Total</div>
                                <div class="fw-bold fs-5 text-success d-flex gap-2 align-items-center">
                                    ${{ (int)$totalDays * (int)str_replace('$','',$booking->room->price) }}
                                    <span class="badge bg-success text-white p-2">Paid</span>
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

.status-completed {
    background-color: #198754; /* Bootstrap green */
    color: #fff;
}

.booking-info li {
    margin-bottom: 6px;
    font-size: 14px;
    color: #cbd5e1;
}
</style>
