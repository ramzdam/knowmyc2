<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrugMovement extends Model
{
    protected $fillable = array('drug_id',
                                'pharmacist_id',
                                'dea_no',
                                'rx_no',
                                'invoice_no',
                                'quantity',
                                'current_soh',
                                'other_manufacturer',
                                'manufacturer',
                                'type',
                                'date_in');
    //
    public function drug() {
        return $this->belongsTo('App\Drug');
    }

    public function pharmacist() {
        return $this->belongsTo('App\Pharmacist');
    }

    public function setDateInAttribute($value) {
        $this->attributes['date_in'] = date('Y-m-d H:i:s', strtotime($value));
//        $this->attributes['date_in'] = Carbon::createFromFormat('Y-m-d', strtotime($value));
    }

    public function setCreatedAtAttribute($value) {
        $this->attributes['created_at'] = date('Y-m-d H:i:s', strtotime($value));
//        $this->attributes['created_at'] = Carbon::createFromFormat('Y-m-d', strtotime($value));
    }
}
