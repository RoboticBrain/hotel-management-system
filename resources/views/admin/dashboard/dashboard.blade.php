@extends('layouts.app')

@section('title', 'Admin dashboard')

@section('selection', 'Home')

@section('content')
    <h2>Welcome , {{ auth()->user()->email }}</h2>
@endsection
