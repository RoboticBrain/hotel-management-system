@extends('layouts.app')

@section('title', 'Edit Room')
@section('selection', 'Edit Room')

@section('content')
<div class="mask d-flex align-items-center gradient-custom-3">
    <div class="container">
        <div class="row d-flex align-items-center">

            <!-- FORM COLUMN -->
            <div class="col-lg-6">
                <div class="card border-0">
                    <div class="card-body p-2" style="background-color: rgb(43, 48, 53);">

                        <form method="POST" action="{{ route('admin.update.room', $room->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <!-- Room Type -->
                            <div class="mt-3">
                                <x-label>Room Type</x-label>
                                <x-select name="room_type" :options="['Single','Double','Deluxe']" selected="{{$room->room_type}}" ></x-select>
                                <x-error name="room_type"></x-error>
                            </div>

                            <!-- Room Number -->
                            <div class="mt-3">
                                <x-label>Room Number</x-label>
                                <x-input type="text" name="room_number" value="{{ $room->room_number }}"></x-input>
                                 <x-error name="room_number"></x-error>
                            </div>

                            <!-- Room Price -->
                            <div class="mt-3">
                                <x-label class="form-label text-white">Room Price</x-label>
                                <x-input type="text" name="price" value="{{ $room->price }}"></x-input>
                                <x-error name="price"></x-error>
                            </div>

                            <!-- Room Status -->
                            <div class="mt-3">
                                <x-label>Room Status</x-label>
                                <x-select name="status" :options="['Available','Booked']" selected="{{ $room->status }}"></x-select>
                            </div>

                            <!-- Submit Button -->
                            <button class="btn btn-success w-100 mt-4" type="submit">
                                Update Room
                            </button>
                        </form>

                    </div>
                </div>
            </div>

            <!-- IMAGE COLUMN -->
            <div class="col-lg-6 d-flex justify-content-center">
                <div class="image-box">
                    <img id="imagePreview"
                         class="img-fluid rounded shadow {{ $room->image ? '' : 'd-none' }}"
                         src="{{ $room->image ? asset('storage/'.$room->image) : '' }}"
                         alt="Room">
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

<script>
function previewImg(event) {
    const input = event.target;
    const preview = document.getElementById('imagePreview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
            preview.classList.remove('d-none');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

