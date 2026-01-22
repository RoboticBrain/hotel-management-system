@extends('layouts.app')
@section('title','edit room')
@section('selection','Edit Customer')
@section('content')
    <div class="mask d-flex align-items-center gradient-custom-3">
    <div class="container">
        <div class="row d-flex align-items-center">

            <!-- FORM COLUMN -->
            <div class="col-lg-6">
                <div class="card border-0">
                    <div class="card-body p-2" style="background-color: rgb(43, 48, 53);">
                        <form method="post" action="{{ route('admin.update.customer',  $customer->id) }}">
                            @csrf
                            @method('PATCH')

                            <!-- Room Type -->
                            <div class="mt-3">
                                <x-label>First Name</x-label>
                                <x-input name="first_name" value="{{ $customer->first_name }}"></x-input>
                                <x-error name="first_name"></x-error>
                            </div>
                            <div class="mt-3">
                                <x-label>Last Name</x-label>
                                <x-input name="last_name" value="{{ $customer->last_name }}"></x-input>
                                <x-error name="last_name"></x-error>
                            </div>

                            <!-- Room Number -->
                            <div class="mt-3">
                                <x-label>Email</x-label>
                                <x-input type="text" name="email" value="{{ $customer->user->email }}"></x-input>
                                 <x-error name="email"></x-error>
                            </div>

                            <!-- Room Price -->
                            <div class="mt-3">
                                <x-label>Address</x-label>
                                <x-input type="text" name="address" value="{{ $customer->address }}"></x-input>
                                <x-error name="address"></x-error>
                            </div>

                            <!-- Room Status -->
                            <div class="mt-3">
                                <x-label>Phone Number</x-label>
                                <x-input name="phone_number" value="{{ $customer->phone_number }}"></x-input>
                                <x-error name="phone_number"></x-error>
                            </div>

                            <!-- Submit Button -->
                            <button class="btn btn-success w-100 mt-4" type="submit">
                                Update Room
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection