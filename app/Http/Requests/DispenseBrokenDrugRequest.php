<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\DocBlock\Tag\AuthorTag;

class DispenseBrokenDrugRequest extends Request
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
            "quantity" => "required|numeric",
            "date_dispensed" => "required",
            "pharmacist" => "required",
            "log_type" => "required",
        ];
    }
}
