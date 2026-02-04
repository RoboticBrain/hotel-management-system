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
                                <x-label>Select Customer</x-label>
                                <select name="customer_id" id="customer"  class="form-control" style="height:50px;" >
                                    @foreach ($customers as $customer)
                                        @if(!$customer->user->isAdmin)
                                            <option value="{{ $customer->user_id }}" >{{ $customer->first_name }}   {{ $customer->last_name }} </option>
                                        @endif
                                    @endforeach
                                </select>
                                <x-error name="customer"></x-error>
                            </div>
                              <div class="mt-3">
                                <x-label>Select Available Room </x-label>
                                <select name="room_number" id="room"  class="form-control" style="height:50px;">
                                    @foreach ($rooms as $room )
                                        @if($rooms->count() == 0)
                                            <option>No rooms available</option> 
                                            @break    
                                        @else 
                                            <option value="{{ $room->room_number }}">{{ $room->room_number }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <x-error name="room_number"></x-error>
                            </div>
                            
                             <div class="mt-3">
                                <x-label>Check in</x-label>
                                <input type="date" name="check_in" class="form-control" style="height:50px;">
                                <x-error name="check_in"></x-error>
                            </div>
                             <div class="mt-3">
                                <x-label>Check out</x-label>
                                <input type="date" name="check_out" class="form-control" style="height:50px;">
                                <x-error name="check_out"></x-error>
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

