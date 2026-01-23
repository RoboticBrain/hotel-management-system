@extends('layouts.app')

@section('title', 'Admin Dashboard')
@section('selection', 'Home')

@section('content')
<div class="container-fluid">

    <!-- Welcome Section -->
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="text-white">Welcome, {{ auth()->user()->customer->first_name }}</h2>        </div>
    </div>
</div>
@endsection
