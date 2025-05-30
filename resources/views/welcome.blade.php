@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1 class="display-4 mb-4">Welcome to the Laravel App</h1>

        @auth
            <p>Hello, {{ Auth::user()->name }}!</p>
            <a href="{{ route('dashboard') }}" class="btn btn-success">Go to Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary me-2">Login</a>
            <a href="{{ route('register') }}" class="btn btn-outline-primary">Register</a>
        @endauth
    </div>
@endsection
