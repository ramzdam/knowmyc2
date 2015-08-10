<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrugMovement extends Model
{
    protected $fillable = array('drug_id', 'pharmacist_id', 'quantity', 'type');
    //
    public function drug() {
        return $this->belongsTo('App\Drug');
    }

    public function pharmacist() {
        return $this->belongsTo('App\Pharmacist');
    }


}
