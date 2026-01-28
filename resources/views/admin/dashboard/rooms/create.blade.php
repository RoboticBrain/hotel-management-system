@extends('layouts.app')

@section('title', 'create room')
@section('selection', 'Create New Room')

@section('content')
<div class="mask d-flex align-items-center gradient-custom-3">
    <div class="container">
        <div class="row d-flex align-items-center">

            <div class="col-lg-6">
                <div class="card border-0">
                    <div class="card-body p-1" style="background-color: rgb(43 48 53);">

                        <form method="post" action="{{ route('admin.store.room') }}" enctype="multipart/form-data">
                            @csrf
                            <x-label>Room Type</x-label>
                            <x-select name="room_type" :options="['single','double','helux']" selected="$room->room_type ?? null">Room type</x-select>
                            <x-error name="room_type"></x-error>
                            
                            <div class="mt-3">
                                <x-label>Room Number</x-label>
                                <x-input type="text" name="room_number" :value="old('room_number')"></x-input>
                            </div>

                            <div class="mt-3">
                                <x-label>Room Price</x-label>
                                <x-input type="text" name="price" value="$"></x-input>
                            </div>
                            <x-error name="room-type"></x-error>

                            <div class="mt-3">
                                <x-label>Room Status</x-label>
                                <x-select name="status" :options="['Available','Occupied']"></x-select>
                            </div>
                         

                            <div class="mt-4">
                                <x-label>Room Image</x-label>
                                <x-input type="file" onchange="previewImg(event)" name="image"></x-input>
                               <x-error name="image"></x-error>
                            </div>

                            <button class="btn btn-success w-100 mt-4" type="submit">
                                Add Room
                            </button>
                        </form>

                    </div>
                </div>
            </div>

            <!-- IMAGE COLUMN -->
            <div class="col-lg-6 d-flex justify-content-center">
                <div class="image-box">
                    <img id="imagePreview"
                         class="img-fluid rounded shadow d-none"
                         alt="Room">
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

<script>
  function previewImg(event) {
        console.log('hi');
        const input = event.target;
        console.log(input);
        const preview = document.getElementById('imagePreview');
        if(input.files && input.files[0]){
            console.log('file found');
            const reader = new FileReader();
            reader.onload = function(e) {
                console.log('inside reader');
                preview.src = e.target.result;
                console.log(e.target);
                preview.style.display = 'block';
                preview.classList.remove('d-none');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
