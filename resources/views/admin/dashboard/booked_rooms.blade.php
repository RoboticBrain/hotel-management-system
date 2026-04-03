@extends('layouts.app')
@section('title','Booked Rooms')
@section('selection','Booked Rooms')
@section('content')
  <div class="container-fluid py-4">
             <table class="table fixed-table align-middle mb-0 rounded border-2">
                        <thead class="table-dark">
                            <tr>
                                @if($booked_rooms->count() < 1)
                                    <tr>
                                        <th class="text-start">list</th>
                                    </tr>
                                    <tr>
                                    <td colspan="10" class="text-start text-danger">
                                        No Bookings so far.
                                    </th>
                                    </tr>
                                    </thead>
        </table>
    @else
        <h3 class="text-white mb-4">Booked Rooms</h3>
        <div class="row g-4">
            @foreach ($booked_rooms as $room)
                <div class="col-md-4 col-lg-3">
                    <div class="card room-card border-0 h-100 position-relative">
                    
                        <span class="badge bg-danger position-absolute top-0 start-0 m-2" style="z-index: 10;">
                            {{$room->status}}
                        </span>

                        <!-- Image -->
                        <div class="room-img position-relative">
                            <img src="{{ asset('storage/'.$room->image) }}"
                                alt="Room image"
                                class="w-100 h-100 object-fit-cover">

                        <span class="price-badge position-absolute bottom-0 end-0 m-2">
                            {{ $room->price }} <small class="text-light">/ night</small>
                        </span>

                        </div>
                        
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title mb-1">
                                {{ $room->room_type }} Bed Room
                            </h5>

                            <p class="text-muted small mb-1">
                                Room No: {{ $room->room_number }}
                            </p>
                            <p class="text-muted small">
                                From {{ $room->bookings()->latest()->first()->checked_in->format('d M ') }} to {{ $room->bookings()->latest()->first()->checked_out->format('d M ') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
  </div>
@endsection

