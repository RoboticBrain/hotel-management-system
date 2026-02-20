@extends('layouts.app')
@section('title','Home')
@section('selection','Home')
@section('content')
<div class="card shadow-sm border-0 bg-transparent mb-4">
    <div class="card-body p-0">
        <form method="GET">
            <div class="row g-3">

                <!-- Search -->
                <div class="col-md-4">
                    <input type="text"
                           name="search"
                           class="form-control"
                           placeholder="Search bookings..."
                           value="{{ request('search') }}">
                </div>

                <!-- Status -->
                <div class="col-md-3">
                    <select name="status" class="form-select">
                        <option value="">All Status</option>
                        <option value="active">Active</option>
                        <option value="completed">Completed</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>

                <!-- Date Range -->
                <div class="col-md-2">
                    <input type="date" name="from" class="form-control"
                           value="{{ request('from') }}">
                </div>

                <div class="col-md-2">
                    <input type="date" name="to" class="form-control"
                           value="{{ request('to') }}">
                </div>

                <!-- Button -->
                <div class="col-md-1">
                    <button class="btn btn-primary w-100">
                        <i class="bi bi-search"></i>
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>


@endsection