<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class Drug extends Model
{
    const INCOMING = 1;
    const OUTGOING = 2;
    const DISPENSE = 3;
    const RTS = 4;
    const BROKEN = 5;
    const EXPIRED = 6;
    const ADD = 7;

    const S_ADD = "Add";
    const S_INCOMING = "Incoming";
    const S_OUTGOING = "Outgoing";
    const S_DISPENSE = "Dispense";
    const S_RTS = "Return to Stock";
    const S_BROKEN = "Broken";
    const S_EXPIRED = "Expired";


    protected $fillable = array('pharmacy_id', 'ndc', 'name', 'strength', 'form', 'quantity', 'threshold_alert', 'manufacturer');


    public function drugMovements() {
        return $this->hasMany('App\DrugMovement');
    }

    public function pharmacy() {
        return $this->belongsTo('App\Pharmacy');
    }

    public function setCreatedAtAttribute($value) {

        $this->attributes['created_at'] = date('Y-m-d H:i:s', strtotime($value));

    }

    public function scopeOwned($query) {
        $query->where('pharmacy_id', Session::get('data.pharmacy')->id);
    }

//    public function getIdAttribute($value) {
//        return Crypt::encrypt($value);
//    }

}
