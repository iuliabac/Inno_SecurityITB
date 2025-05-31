@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Password Reset Token</h2>
        <p>Please use the following token to reset your password:</p>

        <pre class="bg-light p-3 border rounded"><code>{{ $token }}</code></pre>

        <p>
            Click the link below to go to the reset password page.
            Your email should be: <strong>{{ $email }}</strong>
        </p>

        <a href="{{ route('password.reset', ['token' => $token]) }}" class="btn btn-primary">
            Go to Reset Password Page
        </a>
    </div>
@endsection
