<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'access_level',
        'firstname',
        'lastname',
        'city',
        'phone',
        'email',
        'profile_image',
        'password',
    ];

    public function isAdmin()
    {
        return $this->access_level == 1;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function preferences()
    {
        return $this->hasMany(Preference::class); // select * from preferences where user_id =
    }
    // user->preferences; // select * from preferences where user_id = $user_id
    // with this we will have a collection
}
