@extends('layouts.app')

@section('title', 'create booking')
@section('selection', 'Create New Booking')

@section('content')
<div class="mask d-flex align-items-center gradient-custom-3">
    <div class="container">
        <div class="row d-flex align-items-center">

            <div class="col-lg-6">
                <div class="card border-0">
                    <div class="card-body p-1" style="background-color: rgb(43 48 53);">

                        <form method="post" action="{{ route('admin.store.booking') }}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="mt-3">
                                <x-label>Customer</x-label>
                                <x-input type="text" name="customer"></x-input>
                                <x-error name="customer"></x-error>
                            </div>
                            <div class="mt-3">
                            <x-label>Room Type</x-label>
                            <x-input type="text" name="room_number"></x-input>
                            <x-error name="room_type"></x-error>
                            </div>
                            <div class="mt-3">
                                <x-label>Room Number</x-label>
                                <x-input type="text" name="room_number" :value="old('room_number')"></x-input>
                                <x-error name="room_number"></x-error>
                            </div>
                         
                            <button class="btn btn-success w-100 mt-4" type="submit">
                                Add Booking
                            </button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

