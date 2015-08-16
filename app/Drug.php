<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    const INCOMING = 1;
    const OUTGOING = 2;
    const DISPENSE = 3;
    const RTS = 4;
    const BROKEN = 5;
    const EXPIRED = 6;
    protected $fillable = array('pharmacy_id', 'ndc', 'name', 'strength', 'form', 'quantity', 'threshold_alert', 'manufacturer');


    public function drugMovements() {
        return $this->hasMany('App\DrugMovement');
    }

    public function pharmacy() {
        return $this->belongsTo('App\Pharmacy');
    }

    public function setCreatedAtAttribute($value) {
        return date('Y-m-d H:i:s', strtotime($value));
    }
}
