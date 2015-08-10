<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    protected $fillable = array('name',
                                'address',
                                'city',
                                'state',
                                'zipcode',
                                'npi',
                                'dea',
                                'nabp',
                                'contact',
                                'contact_person',
                                'email',
                                'billing_address',
                                'billing_city',
                                'billing_state',
                                'billing_zipcode',
                                'mailing_address',
                                'mailing_city',
                                'mailing_state',
                                'mailing_zipcode',

                            );

    public function pharmacists() {
        return $this->hasMany('App\Pharmacist');

    }

    public function drugs() {
        return $this->hasMany('App\Drug');
    }

}
