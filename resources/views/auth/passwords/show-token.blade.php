@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Password Reset Token</h2>
        <p>Use the following token to reset your password:</p>
        <pre><code>{{ $token }}</code></pre>
        <p>Go to the <a href="{{ route('password.reset', ['token' => $token]) }}">reset password page</a> and enter your email, token, and new password.</p>
    </div>
@endsection
