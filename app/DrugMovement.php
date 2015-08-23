<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrugMovement extends Model
{
    protected $fillable = array('current_soh',
                                'drug_id',
                                'quantity',
                                'pharmacist_id',
                                'type',
                                'created_at');

    public function drug() {
        return $this->belongsTo('App\Drug');
    }

    public function pharmacist() {
//        return $this->belongsTo('App\Pharmacist');
        return $this->belongsTo('App\Pharmacy');
    }


    public function brokenDrug() {
        return $this->hasOne('App\BrokenDrug');
    }

    public function dispensedDrug() {
        return $this->hasOne('App\DispensedDrug');
    }

    public function inventoryDrug() {
        return $this->hasOne('App\InventoryDrug');
    }

    public function setCreatedAtAttribute($value) {
        $this->attributes['created_at'] = date('Y-m-d H:i:s', strtotime($value));

    }

    /**
     * This will convert the parameter int action into string
     *
     * @param int $int_val
     * @return string
     */

    public function typeToString($int_val) {
        switch($int_val) {
            case Drug::INCOMING:
                return Drug::S_INCOMING;
                break;
            case Drug::OUTGOING:
                return Drug::S_OUTGOING;
                break;
            case Drug::DISPENSE:
                return Drug::S_DISPENSE;
                break;
            case Drug::RTS:
                return Drug::S_RTS;
                break;
            case Drug::BROKEN:
                return Drug::S_BROKEN;
                break;
            case Drug::EXPIRED:
                return Drug::S_EXPIRED;
                break;
            case Drug::ADD:
                return Drug::S_ADD;
                break;
            default:
                return "";
                break;
        }
    }

    /**
     * This will convert submitted integer to a string equivalent of action
     *
     * @param string $string
     * @return int
     */

    public function typeToInt($string) {
        switch($string) {
            case Drug::S_INCOMING:
                return Drug::INCOMING;
                break;
            case Drug::S_OUTGOING:
                return Drug::OUTGOING;
                break;
            case Drug::S_DISPENSE:
                return Drug::DISPENSE;
                break;
            case Drug::S_RTS:
                return Drug::RTS;
                break;
            case Drug::S_BROKEN:
                return Drug::BROKEN;
                break;
            case Drug::S_EXPIRED:
                return Drug::EXPIRED;
                break;
            case Drug::S_ADD:
                return Drug::ADD;
                break;
            default:
                return "";
                break;
        }

    }

    public function getTypeAttribute($value) {
        return $this->typeToString($value);

    }
}
