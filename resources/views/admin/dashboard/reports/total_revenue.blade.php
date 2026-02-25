@extends('layouts.app')

@section('title', 'Total Summary')
@section('selection', 'Total Summary')

@section('content')
    <div class="container py-5">
    <h3 class="text-white mb-4">Total Spending</h3>
        <div class="table-responsive">
            <table class="table table-dark table-hover align-middle">
                <thead class="text-uppercase text-secondary">
                    <tr>
                        <th>Date</th>
                        <th>Customer Name</th>
                        <th>Room Type</th>
                        <th>Room No</th>
                        <th>Total Stays</th>
                        <th>Per Night</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                  @php
                    $totalPay = 0;
                  @endphp
                    @foreach($bookings as $booking)
                        @php
                            $checkIn  = $booking->checked_in->startOfDay();
                            $checkOut = $booking->checked_out->startOfDay();
                            $totalDays = $checkIn->diffInDays($checkOut);
                            $totalPay += $totalDays * (int) str_replace('$','',$booking->room->price );
                        @endphp
                        <tr class="align-middle">
                            <td>{{ $booking->checked_in->format('d M')}} <i class="bi bi-arrow-right"></i>  {{  $booking->checked_out->format('d M') }}</td>
                            <td>{{ $booking->customer->first_name }} {{$booking->customer->last_name }}</td>
                            <td>{{ ucfirst($booking->room->room_type) }}</td>
                            <td>{{ $booking->room->room_number }}</td>
                            <td>{{ $totalDays }}</td>
                            <td>{{ $booking->room->price }}</td>
                            <td>${{ $totalDays * (int) str_replace('$','',$booking->room->price ) }}</td>
                        </tr>
                    @endforeach
                  
                </tbody>
                <tfoot>
                    <tr class="fw-bold text-white bg-secondary">
                        <td colspan="5" class="text-end text-info">Total Paid:</td>
                        <td class="text-info">${{ $totalPay }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>


<hr class="my-5 text-secondary">

<h3 class="text-white mb-4">Revenue By Day</h3>

<div class="table-responsive mb-5">
    <table class="table table-dark table-hover align-middle">
        <thead class="text-uppercase text-secondary">
            <tr>
                <th>Date</th>
                <th>Total Revenue</th>
            </tr>
        </thead>
        <tbody>
            @foreach($revenueByDay as $day)
            @php
                $checkIn  = $day->checked_in->startOfDay();
                $checkOut = $day->checked_out->startOfDay();
                $totalDays = $checkIn->diffInDays($checkOut);
                $totalPay += $totalDays * (int) str_replace('$','',$booking->room->price );
            @endphp
                <tr>
                    <td>{{ \Carbon\Carbon::parse($day['checked_in'])->format('d M Y') }}</td>
                    <td class="text-success fw-bold">{{ $day->room->price }}</d>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<h3 class="text-white mb-4">Revenue By Month</h3>

@php
    $revenueByMonth = [
        ['month' => 'January 2026', 'total' => 850],
        ['month' => 'February 2026', 'total' => 420],
        ['month' => 'March 2026', 'total' => 670],
    ];
@endphp

<div class="table-responsive">
    <table class="table table-dark table-hover align-middle">
        <thead class="text-uppercase text-secondary">
            <tr>
                <th>Month</th>
                <th>Total Revenue</th>
            </tr>
        </thead>
        <tbody>
            @foreach($revenueByMonth as $month)
                <tr>
                    <td>{{ $month['month'] }}</td>
                    <td class="text-warning fw-bold">${{ $month['total'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
<style> 

.table-dark {
    background: linear-gradient(145deg, #2b3545, #232b38);
    border-radius: 15px;
    overflow: hidden;
}

.table-dark th {
    border-bottom: 2px solid rgba(255,255,255,0.1);
    letter-spacing: 0.5px;
    font-size: 0.85rem;
}

.table-dark td {
    border-top: 1px solid rgba(255,255,255,0.05);
    font-size: 0.9rem;
}

.table-hover tbody tr:hover {
    background-color: rgba(13,110,253,0.1);
}

tfoot tr {
    font-size: 1rem;
    letter-spacing: 0.5px;
}
</style>