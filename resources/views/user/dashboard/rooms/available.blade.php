@extends('layouts.app')
@section('title','Available Rooms')
@section('selection','Rooms')
@section('content')
  <div class="container-fluid py-4">
    @if($available_rooms->count() < 1)
        <h3 class="text-white mb-4 fs-4 badge bg-danger">No Rooms available</h3>
    @else
        <h3 class="text-white mb-4">Available Rooms</h3>
        <div class="row g-4">
            @foreach ($available_rooms as $room)
                <div class="col-md-4 col-lg-3">
                    <div class="card room-card border-0 h-100 position-relative">

                        <!-- Status badge -->
                        <span class="badge bg-success position-absolute top-0 start-0 m-2" style="z-index: 10;">
                            {{$room->status}}
                        </span>
                        
                        <div class="room-img position-relative">
                            <img src="{{ asset('storage/'.$room->image) }}"
                                alt="Room image"
                                class="w-100 h-100 object-fit-cover">

                        <span class="price-badge position-absolute bottom-0 end-0 m-2">
                            {{ $room->price }} <small class="text-light">/ night</small>
                        </span>

                        </div>

                        <!-- Content -->
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title mb-1">
                                {{ $room->room_type }} Bed Room
                            </h5>

                            <p class="text-muted small mb-3">
                                Room No: {{ $room->room_number }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif
@endsection

