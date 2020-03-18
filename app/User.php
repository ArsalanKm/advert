<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Advert;
use App\Chat;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mobile',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * function for one to n relation between user and advert each user has many adverts
     * @return \Illuminate\Database\Eloquent\Relations\HasMany*
     */
    public function advert()
    {
        return $this->hasMany(Advert::class);
    }

    /**
     * n-to-n relation between user and chat we right belongs to many in both side
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function chat()
    {
        return $this->belongsToMany(Chat::class);
    }

}


