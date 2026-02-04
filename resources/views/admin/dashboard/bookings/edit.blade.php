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
                        <form method="post" action="{{ route('admin.booking.update',$booking->id) }}">
                            @csrf
                            @method('PATCH')
                            <!-- Room Type -->
                            <div class="mt-3">
                                <x-label>check_in</x-label>
                                <x-input type="date" name="check_in" value="{{ $booking->checked_in }}" />
                                <x-error name="check_in"></x-error>
                            </div>
                            <div class="mt-3">
                                <x-label>Check-out</x-label>
                                <x-input type="date" name="check_out" value="{{ $booking->checked_out }}"></x-input>
                                <x-error name="check_out"></x-error>
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