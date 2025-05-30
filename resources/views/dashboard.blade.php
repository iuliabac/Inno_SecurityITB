@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-10 px-6">
    <a href="{{ url('/') }}"
       class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4">
        ← Back to Home
    </a>

    <h1 class="text-3xl font-bold mb-6">Dashboard</h1>

    <p class="mb-4">Welcome, {{ Auth::user()->name }}!</p>
    <p> Here is your little dashboard! </p>
    <div class="mt-4">
        <h4>Activity Chart</h4>
        <img src="{{ asset('images/chart.png') }}" alt="Chart" class="img-fluid border rounded shadow-sm">
    </div>

    <a href="{{ route('logout') }}"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
       class="text-red-500 underline">Logout</a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        @csrf
    </form>
</div>
@endsection
