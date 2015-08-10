<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    protected $fillable = array('pharmacy_id', 'name', 'quantity', 'NDC', 'rx_no', 'drug_schedule', 'prescription', 'script_no');


    public function drugMovements() {
        return $this->hasMany('App\DrugMovement');
    }

    public function pharmacy() {
        return $this->belongsTo('App\Pharmacy');
    }
}
