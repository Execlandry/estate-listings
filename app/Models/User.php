<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail , CanResetPassword
{
    use HasApiTokens, HasFactory, Notifiable, CanResetPasswordTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'remember_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function password(): Attribute{
        return Attribute::make(
            get: fn ($value) => $value,
            set: fn ($value) => Hash::make($value),

        );
    }

    public function listings(): HasMany{
        return $this->hasMany(
        Listing::class,
        'by_user_id');
    }

    public function offers(): HasMany{
        return $this->hasMany(
        Offer::class,
        'bidder_id');
    }

    


}

