@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1 class="display-4 mb-4">Welcome to Dashboard Viewer!</h1>

        <a href="{{ route('about') }}" class="btn btn-info mb-3">About This App</a>

        @auth
            <p>Hello, {{ Auth::user()->name }}!</p>
            <a href="{{ route('dashboard') }}" class="btn btn-success">Go to Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary me-2">Login</a>
            <a href="{{ route('register') }}" class="btn btn-outline-primary">Register</a>
        @endauth
    </div>
@endsection
