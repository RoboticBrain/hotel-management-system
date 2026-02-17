@extends('layouts.app')

@section('title', 'User Dashboard')
@section('selection', 'User Dashboard')

@section('content')
<div class="container-fluid">

    <!-- Dashboard Cards -->
    <div class="row g-3">

        <div class="col-md-4">
            <a href="{{ route('user.show.bookings') }}" class="card-link">
                <div class="card bg-warning text-white shadow-sm clickable-card">
                    <div class="card-body">
                        <h5 class="card-title">My Bookings</h5>
                        <h2 class="card-text">{{ $my_bookings }}</h2> 
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('user.dashboard.active.bookings') }}" class="card-link">
                <div class="card bg-primary text-white shadow-sm clickable-card">
                    <div class="card-body">
                        <h5 class="card-title">Active Bookings</h5>
                        <h2 class="card-text">{{ $active_bookings }}</h2> 
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('user.dashboard.completed.bookings') }}" class="card-link">
                <div class="card bg-success text-dark shadow-sm clickable-card">
                    <div class="card-body">
                        <h5 class="card-title">Completed bookings</h5>
                        <h2 class="card-text">{{ $completed_bookings }}</h2> 
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('user.dashboard.cancelled.bookings') }}" class="card-link">
                <div class="card bg-danger text-white shadow-sm clickable-card">
                    <div class="card-body">
                        <h5 class="card-title">Cancelled Bookings</h5>
                        <h2 class="card-text">{{ $cancelled_bookings }}</h2> 
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('dashboard.rooms.booked') }}" class="card-link">
                <div class="card bg-info text-white shadow-sm clickable-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Amount Spent</h5>
                        <h2 class="card-text">${{ $totalAmountSpent }}</h2> 
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>

<style>
    /* Make the whole card clickable and stylish */
    .clickable-card {
        transition: transform 0.2s, box-shadow 0.2s;
        cursor: pointer;
    }
    .clickable-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.3);
    }

    /* Remove default link styles */
    .card-link {
        text-decoration: none;
        color: inherit;
        display: block;
    }
</style>
@endsection
