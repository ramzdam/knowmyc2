<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pharmacist extends Model
{
    protected $fillable = array('fname', 'mname', 'lname', 'bdate', 'email', 'contact');

    public function account() {
        return $this->hasOne('App\Account');
    }

    public function pharmacy() {
        return $this->belongsTo('App\Pharmacy');
    }

    public function drugMovements() {
        return $this->hasMany('App\DrugMovement');
    }

}
