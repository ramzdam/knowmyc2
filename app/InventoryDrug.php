<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryDrug extends Model
{
    const INCOMING = 1;
    const OUTGOING = 0;
    protected $fillable = array('drug_id', 'dea_no', 'is_incoming', 'distributor_id', 'created_at', 'drug_movement_id');

    public function drug() {
        return $this->belongsTo('App\Drug');
    }

    public function pharmacy() {
        return $this->belongsTo('App\Pharmacy');
    }

    public function distributor() {
        return $this->belongsTo('App\Distributor');
    }

    public function drugMovement() {
        return $this->belongsTo('App\DrugMovement');
    }

    public function setCreatedAtAttribute($value) {
        $this->attributes['created_at'] = date('Y-m-d H:i:s', strtotime($value));

    }
}
