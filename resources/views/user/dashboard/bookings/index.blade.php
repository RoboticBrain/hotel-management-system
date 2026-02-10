
@extends('layouts.app')

@section('title', 'Bookings')
@section('selection', 'Bookings')

@section('content')
<div class="container py-4">

  <h3 class="mb-4 text-white">My Bookings</h3>

  <div class="row g-4">
    <!-- Deluxe Room -->
     @foreach ($user_bookings as $booking )
        <div class="col-md-6 col-lg-3">
        <div class="card h-100 shadow-sm" style="background-color: rgba(255,255,255,0.1); border: none;">
            <!-- Card Header -->
            <div class="card-header text-white fw-bold shadow-sm" 
                style="background-color: rgba(0,0,0,0.4); border-bottom: 1px solid rgba(255,255,255,0.2);">
            {{ $booking->room->room_type }} Bed Room
            </div>
            @php
            $checkIn  = $booking->checked_in->startOfDay();
            $checkOut = $booking->checked_out->startOfDay();
            // Calculate total days (include checkout day if you want)
            $totalDays = $checkIn->diffInDays($checkOut) + 1;
            @endphp
            <div class="card-body text-white">
            <p class="card-text"><strong>Check-in:</strong> {{ $booking->checked_in->format('d M Y')}}</p>
            <p class="card-text"><strong>Check-out:</strong> {{ $booking->checked_out->format('d M Y') }}</p>
            <p class="card-text"><strong>Days:</strong> {{ $totalDays }}</p>
            <p class="card-text"><strong>Total: $</strong>{{(int) str_replace('$','',$booking->room->price) * $totalDays }} </p>
            <span class="badge" style="background-color: #F5C13B; color: #000;">{{ $booking->customer_status }}</span>
            </div>
        </div>
        </div>
     @endforeach
    <p class="mt-3 text-white">
        <i class="bi bi-info-circle"></i> Bookings are read-only. Please contact reception for any changes.
    </p>
</div>




@endsection
