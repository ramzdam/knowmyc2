<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Account extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    protected $table = "accounts";
    protected $fillable = array('username', 'password', 'rights', 'date_created');
    public function pharmacists() {
        return $this->belongsTo('App\Pharmacist');
    }


    public function setPasswordAttribute($password) {
        $this->attributes['password'] = bcrypt($password);
    }

}
