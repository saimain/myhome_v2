<?php

namespace App\Models;

use App\Models\UserPoint;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
        'provider',
        'provider_id'
    ];

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



    // Relations

    public function point()
    {
        return $this->hasOne(UserPoint::class);
    }

    public function order()
    {
        return $this->hasOne(PointOrder::class);
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function save_properties()
    {
        return $this->hasMany(SaveProperty::class);
    }
}
