@extends('layouts.app')

@section('title', 'Rooms')
@section('selection','Rooms')

@section('content')
<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-white">Manage Rooms</h3>
        <a href="{{ route('admin.create.room') }}">
            <button class="btn btn-primary">+ Add Room</button>
        </a>
    </div>

    <!-- Rooms Table -->
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Room No</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th style="text-align: center;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rooms as $index => $room)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td style="width:200px;">
                            <img src="{{ asset('storage/'.$room->image) }}" 
                                 class="img-fluid rounded cursor-pointer" 
                                 onclick="openImageModal(this.src)" 
                                 alt="Room Image">
                        </td>
                        <td>{{ $room->room_number }}</td>
                        <td>{{ $room->room_type }}</td>
                        <td>{{ $room->price }}</td>
                        <td>
                            <span class="badge bg-{{ $room->status == 'Available' ? 'success':'danger' }}">{{ $room->status }}</span>
                        </td>
                        <td style="text-align: center;">
                            <a href="{{ route('admin.edit.room', $room->id) }}" class="btn btn-sm btn-warning me-1">Edit</a>
                            <form action="{{ route('admin.destroy.room', $room->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="mt-3">
                {{ $rooms->links() }}
            </div>
        </div>
    </div>

</div>

<!-- Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-transparent border-0">
            <button type="button" class="btn-close btn-close-white ms-auto me-2 mt-2" data-bs-dismiss="modal"></button>
            <img id="modalImage" class="img-fluid rounded shadow" alt="Room Image">
        </div>
    </div>
</div>
@endsection


<script>
function openImageModal(src) {
    const modalImg = document.getElementById('modalImage');
    modalImg.src = src;

    const modal = new bootstrap.Modal(document.getElementById('imageModal'));
    modal.show();
}
</script>

