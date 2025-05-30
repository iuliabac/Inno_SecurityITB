<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="antialiased text-center p-10">
<h1 class="text-4xl font-bold mb-4">Welcome to the Laravel App</h1>
@auth
    <p>Hello, {{ Auth::user()->name }}!</p>
    <a href="{{ route('dashboard') }}" class="text-blue-500">Go to Dashboard</a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="ml-4 text-red-500">Logout</button>
    </form>
@else
    <a href="{{ route('login') }}" class="text-blue-500 mr-4">Login</a>
    <a href="{{ route('register') }}" class="text-green-500">Register</a>
@endauth
</body>
</html>
