<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class CreateDistributorRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "type" => "required|numeric",
            "date_added"  => "required",
            "name"        => "required",
            "contact"     => "required",
            "address"     => "required",
            "city"        => "required",
            "state"       => "required",
            "zipcode"     => "required",
            "dea"         => "required",
            "npi"         => "required",
            "rep"         => "required",
//            "note" => "required",
        ];
    }
}
