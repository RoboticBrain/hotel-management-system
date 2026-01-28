@extends('layouts.app')
@section('title','edit bookings')
@section('selection','Edit Booking')
@section('content')
    <div class="mask d-flex align-items-center gradient-custom-3">
    <div class="container">
        <div class="row d-flex align-items-center">
            
            <!-- FORM COLUMN -->
            <div class="col-lg-6">
                <div class="card border-0">
                    <div class="card-body p-2" style="background-color: rgb(43, 48, 53);">
                        <form method="post" action="">
                            @csrf
                            @method('PATCH')

                            <!-- Room Type -->
                            <div class="mt-3">
                                <x-label>Room Number</x-label>
                                <x-input name="room_number" value=""></x-input>
                                <x-error name="room_number"></x-error>
                            </div>
                            <div class="mt-3">
                                <x-label>Check-in</x-label>
                                <x-input name="check-in" value=""></x-input>
                                <x-error name="check-in"></x-error>
                            </div>
                            <div class="mt-3">
                                <x-label>Check-out</x-label>
                                <x-input name="check-out" value=""></x-input>
                                <x-error name="check-out"></x-error>
                            </div>

                            <!-- Room Number -->
                            
                            <!-- Submit Button -->
                            <button class="btn btn-success w-100 mt-4" type="submit">
                                Update Booking
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection