@extends('layouts.app')

@section('title', 'Admin dashboard')
@section('selection', 'Customers')
@section('content')

<style>
    /* ===== HARD STOP HORIZONTAL SCROLL ===== */
    html, body {
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
    <div class="row">
        <div class="col-12">
            <div class="card w-100">
                <h5 class="card-header">List</h5>

                <div class="card-body p-2">
                    <!-- DO NOT use table-responsive -->
                    <table class="table fixed-table align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                @if($todaysBooking->count() < 1)
                                    <th colspan="10" class="text-start text-danger">
                                        No bookings found for today.
                                    </th>
                                @else
                                <th>#</th>
                                <th>Customer Name</th>
                                <th>Room Booked</th>
                                <th>Room Number</th>
                                 <th>Status</th>
                                <th>Booking Date</th>
                               
                                
                                @endif
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($todaysBooking as $index => $booking)
                                <tr>
                                    <td>{{ $index + 1 }}</td>

                                    <td>
                                        {{ $booking->customer->first_name }} {{ $booking->customer->last_name }}
                                    </td>

                                    <td>
                                        {{ ucfirst($booking->room->room_type) }} Bed Room
                                    </td>

                                    <td>
                                        {{ $booking->room->room_number }}
                                    </td>
                                    <td>
                                        {{ strtoupper($booking->customer_status) }}
                                    </td>
                                    <td>
                                        {{ $booking->checked_in->format('d M Y') }} - {{ $booking->checked_out->format('d M Y') }}
                                    </td>
                                   
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
