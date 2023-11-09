<?php
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

use Inertia\Inertia;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\NotificationSeenController;
// use Illuminate\Notifications\Events\NotificationSent;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\ListingOfferController;
use App\Http\Controllers\RealtorListingAcceptOfferController;
use App\Http\Controllers\RealtorListingController;
use App\Http\Controllers\RealtorListingImageController;
use App\Http\Controllers\UserAccountController;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'index']);


// Route::get('/hello', [IndexController::class, 'show'])
//   ->middleware('auth');

Route::resource('listing', ListingController::class)
  ->only(['index', 'show']);


Route::resource('listing.offer',ListingOfferController::class)
  ->middleware('auth')
  ->only(['store']);

Route::resource('notification', NotificationController::class)
  ->middleware('auth')
  ->only(['index']);

Route::put('notification/{notification}/seen',NotificationSeenController::class)
  ->middleware('auth')
  ->name('notification.seen');

Route::get('login', [AuthController::class, 'create'])
  ->name('login');

Route::post('login', [AuthController::class, 'store'])
  ->name('login.store');
  
Route::delete('logout',[AuthController::class, 'destroy'])
  ->name('logout');


//verify route template config
Route::get('/email/verify',function(){
    return inertia('Auth/VerifyEmail');
  })
  ->middleware('auth')
  ->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()
    ->route('listing.index')
    ->with('success','Email was Verified!');

  })
  ->middleware(['auth', 'signed'])
  ->name('verification.verify');


//resending verification email
Route::post('/email/verification-notification', function (Request $request) {
  $request->user()->sendEmailVerificationNotification();
  return back()
  ->with('success', 'Verification link sent!');

  })
  ->middleware(['auth', 'throttle:6,1'])
  ->name('verification.send'); //throttle ->kernel.php 6 times in 1 min


//forgot password
// 1
// Display password reset request form
Route::get('/forgot-password', function () {
  return inertia('Auth/ForgotPassword');
  })
  ->middleware('guest')
  ->name('password.request');

// 2
// Handle password reset request
Route::post('/forgot-password', function (Request $request) {
  $request->validate(
    ['email' => 'required|email|exists:users']);

    $status = Password::sendResetLink(
        $request->only('email')
      );

  return $status === Password::RESET_LINK_SENT
              ? back()
              ->with(['status' => __($status)])
              : back()
              ->withErrors(['email' => __($status)]);
})
  ->middleware('guest')
  ->name('password.email');

// 3
// Display password reset form
Route::get('/reset-password/{token}', function (string $token) {
  return inertia('Auth/ResetPassword', ['token' => $token]);
})
->middleware('guest')
->name('password.reset');




// 4
// Handle password reset form submission
Route::post('/reset-password', function (Request $request) {
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
})->middleware('guest')->name('password.update');


Route::resource('user-account', UserAccountController::class)
->only(['create', 'store']);


Route::prefix('realtor')
  ->name('realtor.')
  ->middleware(['auth','verified'])
  ->group(function () {

    Route::name('listing.restore')
      ->put(
        'listing/{listing}/restore',
        [RealtorListingController::class, 'restore']
      )->withTrashed();

    Route::resource('listing', RealtorListingController::class)
      // ->only(['index', 'destroy', 'edit', 'update', 'create', 'store'])
      ->withTrashed();

      //since we are modifying a data and not creating (put)
    Route::name('offer.accept')->put('offer/{offer}/accept',RealtorListingAcceptOfferController::class);
    Route::name('offer.reject')->put('offer/{offer}/reject',RealtorListingAcceptOfferController::class);


    Route::resource('listing.image',RealtorListingImageController::class)->only(['create','store','destroy']);
 
  });