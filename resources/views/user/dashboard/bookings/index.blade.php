@extends('layouts.app')

@section('title', 'Bookings')
@section('selection', 'Bookings')

@section('content')
<div class="container py-4">
    @if($user_bookings->count() < 1)
        <div><h2 class="text-white badge bg-danger fs-4">No Bookings so far</h2></div>
    @else
        <h3 class="mb-4 text-white">My Bookings</h3>
        <div class="row g-4">
            @foreach ($user_bookings as $booking)
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 shadow-lg rounded-4 fancy-card"
                        style="transition: transform 0.3s, box-shadow 0.3s;">

                        <!-- Card Header -->
                        <div class="card-header fw-bold text-white rounded-top-4"
                            style="background: linear-gradient(135deg, #4e5d6c, #2c343b);
                                    border-bottom: 1px solid rgba(255,255,255,0.2);
                                    text-align: center;
                                    box-shadow: inset 0 -3px 5px rgba(0,0,0,0.2);">
                            {{ $booking->room->room_type }} Bed Room ({{ $booking->room->room_number }})
                        </div>

                        @php
                            $checkIn  = $booking->checked_in->startOfDay();
                            $checkOut = $booking->checked_out->startOfDay();
                            $totalDays = $checkIn->diffInDays($checkOut) + 1;
                        @endphp

                        <div class="card-body text-white">
                            <p class="card-text"><strong>Check-in:</strong> {{ $booking->checked_in->format('d M Y') }}</p>
                            <p class="card-text"><strong>Check-out:</strong> {{ $booking->checked_out->format('d M Y') }}</p>
                            <p class="card-text"><strong>Days:</strong> {{ $totalDays }}</p>
                            <p class="card-text"><strong>Total: $</strong>{{ (int) str_replace('$','',$booking->room->price) * $totalDays }}</p>
                            <span class="badge rounded-pill status-badge">
                                {{ $booking->customer_status }}
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
         <p class="mt-3 text-white">
        <i class="bi bi-info-circle"></i> Bookings are read-only. Please contact reception for any changes.
    </p>
</div>
        @endif

   

<style>
/* Card background, shadow and hover effect */
.fancy-card {
    background-color: rgba(60, 70, 80, 0.85); /* lighter than main bg */
    border: 1px solid rgba(255,255,255,0.1);
    box-shadow: 0 6px 15px rgba(0,0,0,0.5);
}
.fancy-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 25px rgba(0,0,0,0.7), inset 0 0 10px rgba(255,255,255,0.05);
}

/* Status badge colors */
.status-badge {
    padding: 0.4em 0.8em;
    font-weight: 600;
    font-size: 0.9em;
    display: inline-block;
}
.status-badge.pending {
    background-color: #F5C13B; color: #000; /* yellow */
}
.status-badge.confirmed {
    background-color: #28A745; color: #fff; /* green */
}
.status-badge.cancelled {
    background-color: #DC3545; color: #fff; /* red */
}

/* Card text styling */
.card-body p {
    border-bottom: 1px dashed rgba(255,255,255,0.1);
    padding-bottom: 5px;
    margin-bottom: 5px;
}

/* Optional subtle inner glow for fancy look */
.fancy-card::before {
    content: '';
    position: absolute;
    inset: 0;
    border-radius: 1rem;
    box-shadow: inset 0 0 10px rgba(255,255,255,0.05);
    pointer-events: none;
}
</style>
@endsection
