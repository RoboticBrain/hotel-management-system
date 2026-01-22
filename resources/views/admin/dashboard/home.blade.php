@extends('layouts.app')

@section('title', 'Admin Dashboard')
@section('selection', 'Home')

@section('content')
<div class="container-fluid">

    <!-- Welcome Section -->
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="text-white">Welcome, {{ auth()->user()->customer->first_name }}</h2>
            <p class="text-light">This is your admin dashboard overview.</p>
        </div>
    </div>

    <!-- Dashboard Cards -->
    <div class="row g-3">

        <div class="col-md-4">
            <div class="card bg-secondary text-white shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <h2 class="card-text">{{ $no_of_users }}</h2> 
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-success text-dark shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Rooms Available</h5>
                    <h2 class="card-text">{{ $no_of_room }}</h2> 
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-danger text-white shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Rooms Booked</h5>
                    <h2 class="card-text">{{ $no_of_bookings }}</h2> 
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
