<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    const WHOLESALER_PRIMARY = 0;
    const WHOLESALER_OTHER = 1;
    const PHARMACY = 2;
    const OTHERS = 3;

    const S_WHOLESALER_PRIMARY = "PRIMARY";
    const S_WHOLESALER_OTHER = "WHOLESALER OTHER";
    const S_PHARMACY = "PHARMACY";
    const S_OTHERS = "OTHERS";
    protected $fillable = array('name',
                                'pharmacy_id',
                                'type',
                                'contact',
                                'address',
                                'city',
                                'state',
                                'zipcode',
                                'npi',
                                'dea',
                                'rep',
                                'note',
                                'created_at');

    public function drugMovements() {
        return $this->hasMany('App\DrugMovement');
    }

    public function inventoryDrugs() {
        return $this->hasMany('App\InventoryDrug');
    }

    public function setCreatedAtAttribute($value) {
        $this->attributes['created_at'] = date('Y-m-d H:i:s', strtotime($value));
    }

    public function getTypeAttribute($value) {

        switch($value) {
            case self::WHOLESALER_PRIMARY:
                return self::S_WHOLESALER_PRIMARY;
                break;
            case self::WHOLESALER_OTHER:
                return self::S_WHOLESALER_OTHER;
            case self::PHARMACY:
                return self::S_PHARMACY;
            case self::OTHERS:
                return self::S_OTHERS;
            default:
                return "";
                break;
        }
    }
}
