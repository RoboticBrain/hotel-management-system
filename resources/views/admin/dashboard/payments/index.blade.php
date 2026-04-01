@extends('layouts.app')

@section('title', 'payments')
@section('selection', 'Payments')
@section('filter-form')
    <x-filter-form :route="route('admin.filter.payments')" :statuses="['Paid','Unpaid']" :roomTypes="['Single','Double','Deluxe']" :priceFilter="true" placeholder="Search Payments..." ></x-filter-form>    
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
        <h3 class="text-white">payments</h3>
    </div>

    <div class="row">
        <div class="col-12">

            <div class="card w-100 shadow-sm">
                <h5 class="card-header">List</h5>

                <div class="card-body p-2">
                    <table class="table fixed-table align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                @if($payments->count() < 1)
                                    <th colspan="10" class="text-start text-danger">
                                        No Payment history found
                                    </th>
                                @else
                                    <th style="width:20%">Transaction ID</th>
                                    <th style="width:16">Customer name</th>
                                    <th style="width:16%">Room Type</th>
                                    <th style="width:16%">Amount</th>
                                    <th style="width:16%">Currency</th>
                                    <th style="width:16%">Status</th>
                                @endif
                            </tr>
                        </thead>

                        <tbody>
                        @foreach ($payments as $payment)
                            <tr>
                                <td>{{ $payment->payment_intent_id }}</td>
                                <td>{{ $payment->booking->customer->first_name }} {{ $payment->booking->customer->last_name }}</td>
                                <td>{{ ucfirst($payment->booking->room->room_type) }} ({{ $payment->booking->room->room_number }})</td>
                                <td>{{ $payment->amount }}</td>
                                <td>{{ $payment->currency }}</td>
                                <td><span class="badge bg-{{ $payment->status == 'Paid' ? 'success' : 'danger' }}">{{ $payment->status }}</span></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
