@extends('layouts.app')
@section('title','Book a room')
@section('selection','Book Your Room')
@section('content')
  <div class="mask d-flex align-items-center gradient-custom-3">
    <div class="container">
        <div class="row d-flex">
            <div class="col-lg-4">
                <div class="card border-0">
                    <div class="card-body p-2" style="background-color: rgb(43, 48, 53);">
                        <form method="post" action="{{ route('user.book.room',$room->id) }}">
                            @csrf

                             <div class="mt-3">
                                <x-label>Room Type</x-label>
                                <x-input type="text" value="{{ $room->room_type }}" readonly></x-input>
                                <x-error name=""></x-error>
                            </div>
                            
                            <div class="mt-3">
                                <x-label>Room Number</x-label>
                                <x-input type="text" name="" value="{{ $room->room_number }}" readonly></x-input>
                                 <x-error name=""></x-error>
                            </div>

                            <div class="mt-3">
                                <x-label class="form-label text-white">Room Price</x-label>
                                <x-input type="text" name="" value="{{ $room->price }}" readonly></x-input>
                                <x-error name=""></x-error>
                            </div>

                            <div class="mt-3">
                                <x-label>Check in</x-label>
                                <x-input type="date" name="check_in" value="" />
                                <x-error name="check_in"></x-error>
                            </div>

                            <div class="mt-3">
                                <x-label>Check out</x-label>
                                <x-input type="date" name="check_out" value="" />
                                <x-error name="check_out"></x-error>
                            </div>

                            <button class="btn btn-success w-100 mt-4" type="submit">
                                Book
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Image: 2/3 width -->
            <div class="col-lg-8 d-flex justify-content-center">
                <div class="image-box w-100">
                    <img src="{{ asset('storage/' . $room->image) }}" 
                         class="img-fluid rounded shadow" 
                         style="height: 500px; object-fit: cover; width: 95%; " 
                         alt="Room">
                </div>
            </div>

        </div>
    </div>
</div>

@endsection


