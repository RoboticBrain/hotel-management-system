@extends('layouts.app')

@section('title', 'Total Summary')
@section('selection', 'Total Summary')

@section('content')
    <div class="container py-5">
    <h3 class="text-white mb-4">Your Booking Spending</h3>
        <div class="table-responsive">
            <table class="table table-dark table-hover align-middle">
                <thead class="text-uppercase text-secondary">
                    <tr>
                        <th>Date</th>
                        <th>Room Type</th>
                        <th>Room No</th>
                        <th>Nights</th>
                        <th>Price/Night</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                  
                    @foreach($bookings as $booking)
                        @php
                            $checkIn  = $booking->checked_in->startOfDay();
                            $checkOut = $booking->checked_out->startOfDay();
                            $totalDays = $checkIn->diffInDays($checkOut);
                        @endphp
                        <tr class="align-middle">
                            <td>{{ $booking->checked_in->format('d M')}} <i class="bi bi-arrow-right"></i>  {{  $booking->checked_out->format('d M') }}</td>
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
                        <td colspan="5" class="text-end text-info">Total Spent:</td>
                        <td class="text-info">${{ $totalPay }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>

</div>
@endsection
<style>
/* Dark & authentic table style */
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