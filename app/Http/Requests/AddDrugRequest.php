<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class AddDrugRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::check()) {

            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name"           => "required",
            "strength"       => "required",
            "form"           => "required",
            "manufacturer"   => "required",
            "ndc"            => "required",
            "threshold"      => "required|numeric",
            "quantity"       => "required|numeric",
            "date_dispensed" => "required",
        ];
    }
}
