<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = array('username', 'password', 'rights', 'date_created');
    public function pharmacists() {
        return $this->belongsTo('App\Pharmacist');
    }


    public function setPasswordAttribute($password) {
        $this->attributes['password'] = bcrypt($password);
    }

}
