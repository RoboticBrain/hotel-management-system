@extends('layouts.app')

@section('title', 'Admin Dashboard')
@section('selection', 'Admin Dashboard')

@section('content')
<div class="container-fluid">

    <!-- Welcome Section -->
    <div class="row mb-4">
        
    </div>

    <!-- Dashboard Cards -->
    <div class="row g-3">

        <div class="col-md-4">
            <div class="card bg-secondary text-white shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <h2 class="card-text">{{ $total_users }}</h2> 
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-secondary text-white shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Rooms</h5>
                    <h2 class="card-text">{{ $total_rooms }}</h2> 
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-success text-dark shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Rooms Available</h5>
                    <h2 class="card-text">{{ $available_rooms }}</h2> 
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-danger text-white shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Rooms Booked</h5>
                    <h2 class="card-text">{{ $total_bookings }}</h2> 
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
