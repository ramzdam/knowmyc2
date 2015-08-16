<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateDrugRequest extends Request
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
            "ndc"            => "required",
            "threshold"      => "required|numeric",
            "invoice"        => "required",
            "quantity"       => "required|numeric",
            "dea"            => "required",
            "date_dispensed" => "required",
            "to_from"        => "required",
        ];
    }
}
