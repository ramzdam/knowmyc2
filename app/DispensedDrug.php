<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DispensedDrug extends Model
{
    protected $fillable = array('drug_id', 'rx_no', 'date_in', 'created_at', 'drug_movement_id');

    public function drug() {
        return $this->belongsTo('App\Drug');
    }

    public function pharmacy() {
        return $this->belongsTo('App\Pharmacy');
    }

    public function drugMovement() {
        return $this->belongsTo('App\DrugMovement');
    }

    public function setCreatedAtAttribute($value) {
        $this->attributes['created_at'] = date('Y-m-d H:i:s', strtotime($value));
    }

    public function setDateInAttribute($value) {
        $this->attributes['date_in'] = date('Y-m-d H:i:s', strtotime($value));
    }
}
