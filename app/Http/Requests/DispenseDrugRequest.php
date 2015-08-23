<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class DispenseDrugRequest extends Request
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
            "ndc" => "required",
            "pharmacist" => "required",
            "rx_no" => "required",
            "quantity" => "required|numeric",
            "date_dispensed" => "required",
            "date_written" => "required",
        ];
    }
}
