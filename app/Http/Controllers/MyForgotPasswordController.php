<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class MyForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return inertia('Auth/ForgotPassword');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(
            ['email' => 'required|email|exists:users']
        );

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()
            ->with(['status' => __($status)])
            : back()
            ->withErrors(['email' => __($status)]);
    }
}
