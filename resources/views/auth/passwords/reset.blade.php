@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Reset Password</h2>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Hidden reset token -->
            <p>Token: {{ $token }}</p>

            <input type="hidden" name="token" value="{{ $token }}">

            <!-- Email Address -->
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') ?? request('email') }}"
                    required
                    autofocus
                    class="form-control @error('email') is-invalid @enderror"
                >
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- New Password -->
            <div class="mb-3">
                <label for="password" class="form-label">New Password</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    class="form-control @error('password') is-invalid @enderror"
                >
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm New Password -->
            <div class="mb-3">
                <label for="password-confirm" class="form-label">Confirm New Password</label>
                <input
                    id="password-confirm"
                    type="password"
                    name="password_confirmation"
                    required
                    class="form-control"
                >
            </div>

            <button type="submit" class="btn btn-primary">Reset Password</button>
        </form>
    </div>
@endsection
