@extends('layouts.app')

@section('title', 'Bookings')
@section('selection', 'Bookings')
@section('filter-form')
    <x-filter-form :route="route('admin.filter.bookings')" :statuses="['checked in','checked out','cancelled','confirmed']" :roomTypes="['Single','Double','Deluxe']" :dateFilter="true" placeholder="Search Bookings..." ></x-filter-form>    
@endsection
@section('content')

<style>
    /* ===== HARD STOP HORIZONTAL SCROLL ===== */
 

    .fixed-table {
        table-layout: fixed !important;
        width: 100% !important;
    }

    .fixed-table th,
    .fixed-table td {
        max-width: 0;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .action-buttons {
        display: flex;
        gap: 6px;
        flex-wrap: nowrap;
    }
</style>

<div class="container-fluid px-2">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-white">Manage Bookings</h3>
        <a href="{{ route('admin.create.booking') }}" class="btn btn-primary">
            + Add Booking
        </a>
    </div>

    <div class="row">
        <div class="col-12">

            <div class="card w-100 shadow-sm">
                <h5 class="card-header">List</h5>

                <div class="card-body p-2">
                    <table class="table fixed-table align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                @if($bookings->count() < 1)
                                    <th colspan="10" class="text-start text-danger">
                                        No bookings found.
                                    </th>
                                @else
                                    <th style="width:8%">User ID</th>
                                    <th style="width:10%">Customer</th>
                                    <th style="width:8%">R-Type</th>
                                    <th style="width:8%">R-Number</th>
                                    <th style="width:12%">Check In</th>
                                    <th style="width:12%">Check Out</th>
                                    <th style="width:12%">Status</th>
                                    <th style="width:12%">Payment</th>
                                    <th style="width:18%">Actions</th>
                                @endif
                            </tr>
                        </thead>

                        <tbody>
                        @foreach ($bookings as $booking)

                            @php
                                /* ===== STATUS COLOR LOGIC ===== */
                                $status = strtolower($booking->customer_status);

                                $statusClass = match($status) {
                                    'checked_in'  => 'success',
                                    'checked_out' => 'secondary',
                                    'confirmed'   => 'primary',
                                    'cancelled'   => 'danger',
                                    default       => 'secondary',
                                };

                                $paymentClass = strtolower($booking->payment_status) === 'paid'
                                    ? 'success'
                                    : 'danger';
                            @endphp

                            <tr>                                    <td>{{ $booking->customer->id + 50 }}</td>
                                    <td>{{ $booking->customer->first_name }}</td>
                                    <td>{{ $booking->room->room_type }}</td>
                                    <td>{{ $booking->room->room_number }}</td>
                                    <td>{{ $booking->checked_in->format('d M Y') }}</td>
                                    <td>{{ $booking->checked_out->format('d M Y') }}</td>
                             
                                <!-- STATUS -->
                                <td>
                                    <span class="badge bg-{{ $statusClass }}">
                                        {{ str_replace('_',' ', ucfirst($booking->customer_status)) }}
                                    </span>
                                </td>

                                <!-- PAYMENT -->
                                <td>
                                    <span class="badge bg-{{ $paymentClass }}">
                                        {{ $booking->payment_status ?? 'Pending' }}
                                    </span>
                                </td>

                                <!-- ACTIONS -->
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('admin.booking.edit', $booking->id) }}"
                                           class="btn btn-sm btn-warning">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.booking.destroy', $booking->id) }}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Cancel this booking?')">
                                                Cancel
                                            </button>
                                        </form>
                                    </div>
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
