<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function showResetForm(string $token){
        return inertia('Auth/ResetPassword', ['token' => $token]);        

    }

    public function reset(Request $request){
        $request->validate([
                  'token' => 'required',
                  'email' => 'required|email',
                  'password' => 'required|min:8|confirmed',
              ]);
            
              $status = Password::reset(
                  $request->only('email', 'password', 'password_confirmation', 'token'),
                  function (User $user, string $password) {
                      $user->forceFill([
                          'password' => Hash::make($password)
                      ])->setRememberToken(Str::random(60));
            
                      $user->save();
            
                      event(new PasswordReset($user));
                  }
              );
            
              return $status === Password::PASSWORD_RESET
                          ? redirect()->route('login')->with('status', __($status))
                          : back()->withErrors(['email' => [__($status)]]);

    }
}
