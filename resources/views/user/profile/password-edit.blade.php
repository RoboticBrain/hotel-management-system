@extends('layouts.app')

@section('title', 'Change Password')
@section('selection','Profile Update')
@section('content')
<div class="container-fluid px-0">
    <div class="row gx-0">
        <div class="col-12 col-lg-6 px-0">
            <h3 class="mb-4">Change Password</h3>

            {{-- Success Message --}}
            @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('profile.update.password', $user->id) }}" method="POST">
        @csrf
        @method('POST')

        <div class="mb-3">
            <label>Current Password</label>
            <input type="password" name="current_password" class="form-control">
        </div>

        <div class="mb-3">
            <label>New Password</label>
            <input type="password" name="new_password" class="form-control">
        </div>

        <div class="mb-3">
            <label>Confirm Password</label>
            <input type="password" name="new_password_confirmation" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">
            Update Password
        </button>

    </form>
        </div>
    </div>
</div>
@endsection