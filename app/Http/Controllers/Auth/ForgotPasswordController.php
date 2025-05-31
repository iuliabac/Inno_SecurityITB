<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class ForgotPasswordController extends Controller
{
    /**
     * Show the form to request a password reset link.
     *
     * @return \Illuminate\View\View
     */
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email'); // Your "forgot password" form view
    }

    /**
     * Handle sending the password reset link email (or showing the token for debug).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function sendResetLinkEmail(Request $request)
    {
        // Validate email input, must exist in users table
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        // Generate a raw token string (user gets this token)
        $token = Str::random(64);

        Log::info("Password reset token generated for {$request->email}: {$token}");

        // Hash the token before storing in database
        $hashedToken = hash('sha256', $token);

        // Store or update the token record in password_resets table
        $inserted = DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => $hashedToken,
                'created_at' => Carbon::now(),
            ]
        );

        Log::info('Password reset token stored in database', [
            'email' => $request->email,
            'inserted' => $inserted,
        ]);

        // Instead of sending an email, just show the token for testing
        return view('auth.passwords.show-token', [
            'token' => $token,   // raw token user will use in reset link
            'email' => $request->email,
        ]);
    }
}
