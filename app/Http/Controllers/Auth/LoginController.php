<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    // Define the username field for throttling, usually 'email'
    public function username()
    {
        return 'email';
    }

    // Customize max attempts before lockout
    protected function maxAttempts()
    {
        return 5;  // You can increase or decrease this number
    }

    // Customize lockout time in minutes
    protected function decayMinutes()
    {
        return 1;  // Lockout duration in minutes
    }

    // Optionally, customize the lockout response message
    protected function sendLockoutResponse(Request $request)
    {
        $seconds = $this->limiter()->availableIn(
            $this->throttleKey($request)
        );

        return redirect()->back()
            ->withInput($request->only($this->username()))
            ->withErrors([
                $this->username() => "Too many login attempts. Please try again in $seconds seconds.",
            ]);
    }
}
