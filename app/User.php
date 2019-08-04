<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','username', 'password','country','city','mobile','tauth','tfver','emailv','smsv','refer','balance','status','vsent','vercode','secretcode'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function eplayer()
    {
        return $this->hasMany('App\Eplayer', 'id', 'user_id');
    }

    public function qplayer()
    {
        return $this->hasMany('App\Qplayer', 'id', 'user_id');
    }

    public function nplayer()
    {
        return $this->hasMany('App\Nplayer', 'id', 'user_id');
    }
    
    public function withdraw()
    {
        return $this->hasMany('App\Withdraw', 'id', 'user_id');
    }

    public function deposit()
    {
        return $this->hasMany('App\Deposit', 'id', 'user_id');
    }
    public function transaction()
    {
        return $this->hasMany('App\Transaction', 'id', 'user_id');
    }
}
