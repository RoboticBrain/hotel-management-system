@extends('layouts.app')

@section('title', 'profile')

@php
    $adminOruser = $customer->user->isAdmin ? 'Admin Profile' : 'User Profile';
@endphp

@section('selection', $adminOruser)

@section('content')
<section>
  <div class="container py-5">
    <form action="{{ route('profile.update', $customer->id) }}" method="POST">
        @csrf
        @method('POST')
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card mb-4 h-100">
                    <div class="card-body text-center d-flex flex-column align-items-center justify-content-center">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                        class="rounded-circle img-fluid" style="width: 150px;">

                        <p class="text-muted mb-1 mt-3" style="font-weight:bold;">
                        {{ $customer->user->isAdmin ? 'Administrator' : 'User' }}
                        </p>
            </div>
          </div>
        </div>

        <div class="col-lg-8">
          <div class="card mb-4 h-100 flex justify-content-center">
            <div class="card-body">

              <!-- Name -->
              <div class="row mb-3">
                <div class="col-sm-3">Full Name</div>
                <div class="col-sm-9 d-flex gap-2">
                  <input type="text" name="first_name" class="form-control"
                         value="{{ $customer->first_name }}">
                  <input type="text" name="last_name" class="form-control"
                         value="{{ $customer->last_name }}">
                </div>
              </div>

              <!-- Email -->
              <div class="row mb-3">
                <div class="col-sm-3">Email</div>
                <div class="col-sm-9">
                  <input type="email" name="email" class="form-control"
                         value="{{ $customer->user->email }}">
                </div>
              </div>

              <!-- Phone -->
              <div class="row mb-3">
                <div class="col-sm-3">Mobile</div>
                <div class="col-sm-9">
                  <input type="text" name="phone_number" class="form-control"
                         value="{{ $customer->phone_number }}">
                </div>
              </div>

              <!-- Address -->
              <div class="row mb-3">
                <div class="col-sm-3">Address</div>
                <div class="col-sm-9">
                  <input type="text" name="address" class="form-control"
                         value="{{ $customer->address }}">
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <!-- Submit -->
      <div class="text-end mt-3">
        <button type="submit" class="btn btn-primary">
          Update Profile
        </button>
      </div>

    </form>
  </div>
</section>
@endsection