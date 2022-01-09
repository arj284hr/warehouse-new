<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'driver_name','email', 'password','customer_id',
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

    public function isAdmin()
    {
        return $this->type == USER_TYPES['admin'];
    }

    public function isManager()
    {
        return $this->type == USER_TYPES['manager'];
    }

    public function isEmployee()
    {
        return $this->type == USER_TYPES['employee'];
    }

    public function manager()
    {
        return $this->belongsto('App\WareHouse', 'customer_id', 'id');
    }

    public function employee()
    {
        return $this->belongsto('App\WareHouse', 'customer_id', 'id');
    }

    public function driver()
    {
        return $this->hasMany('App\InOutLoad', 'driver_id', 'id');
    }

    public function associate_details()
    {
        return $this->hasMany('App\Pay', 'associate_id', 'id');
    }

}
