@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">About This Application</h1>

        <p>This Laravel app demonstrates basic user authentication, protected routes, and dynamic content rendering based on login status.</p>

        <h3 class="mt-5">Dashboard Viewer</h3>
        <p>
            The Dashboard is accessible only to authenticated users. Once logged in, users can view a personalized Dashboard containing secure content, such as charts, user data, and navigation links. It ensures that only registered users can access sensitive or interactive parts of the application.
        </p>
    </div>
@endsection
