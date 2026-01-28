@extends('layouts.app')

@section('title', 'Bookings')
@section('selection', 'Bookings')

@section('content')

<style>
    /* ===== HARD STOP HORIZONTAL SCROLL ===== */
    html, body, .container-fluid, .row, .col-12 {
        max-width: 100vw;
        overflow-x: hidden !important;
    }

    /* Lock table layout */
    .fixed-table {
        table-layout: fixed !important;
        width: 100% !important;
        max-width: 100% !important;
    }

    /* Force cells to stay inside */
    .fixed-table th,
    .fixed-table td {
        max-width: 0;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    /* Button column safety */
    .action-buttons {
        display: flex;
        gap: 6px;
        flex-wrap: nowrap;
        max-width: 100%;
    }

    .action-buttons form {
        margin: 0;
    }
</style>

<div class="container-fluid px-2">
     <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-white">Manage Rooms</h3>
        <a href="{{ route('admin.create.booking') }}">
            <button class="btn btn-primary">+ Add Booking</button>
        </a>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card w-100">
                <h5 class="card-header">List</h5>

                <div class="card-body p-2">
                    <!-- DO NOT use table-responsive -->
                    <table class="table fixed-table align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th style="width:8%">User Id</th>
                                <th style="width:8%">Customer</th>
                                <th style="width:8%">R-Type</th>
                                <th style="width:8%">R-Number</th>
                                <th style="width:12%">Check-in</th>
                                <th style="width:13%">Check-out</th>
                                <th style="width:13%">Room Status</th>
                                <th style="width:13%">Payment Status</th>
                                <th style="width:15%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($bookings as $booking)
                                <tr>
                                
                                    @foreach ($booking->customers as $index => $customer )
                                        <td>{{ $customer->id + 50}} </td>
                                        <td>{{ $customer->first_name}}</td>
                                        <td>{{ $booking->room_type}}</td>
                                        <td>{{ $booking->room_number}}</td>
                                        <td>{{ $customer->pivot->checked_in }}</td>
                                        <td>{{ $customer->pivot->checked_out }}</td>
                                        <td><span class="badge bg-success ms-1">{{ $booking->status }}</span></td>
                                        <td> <span class="badge bg-success">{{ $customer->pivot->payment_status ?? "paid"}}</span></td>
                                        <td>
                                            <div class="action-buttons">
                                                <a href="{{ route('admin.booking.edit',1) }}"class="btn btn-sm btn-warning">Edit</a>
                                                <form action="" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </td> 
                                </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
