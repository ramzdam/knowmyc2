<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateAccountRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "username"        => "required|min:5",
            "password"        => "required|min:7",
            "name"            => "required|min:5",
            "address"         => "required",
            "city"            => "required",
            "state"           => "required",
            "zipcode"         => "required|min:4",
            "npi"             => "required",
            "dea"             => "required",
            "nabp"            => "required",
            "pic"             => "required",
            "contact"         => "required",
            "contact_person"  => "required",
            "email"  => "required|email|unique:pharmacies",
            "billing_address" => "required",
            "billing_city"    => "required",
            "billing_state"   => "required",
            "billing_zipcode" => "required",
            "mailing_address" => "required",
            "mailing_city"    => "required",
            "mailing_state"   => "required",
            "mailing_zipcode" => "required",
        ];
    }
}
