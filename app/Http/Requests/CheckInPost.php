<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckInPost extends FormRequest
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
            "visitor_name" => "required",
            "visitor_from" => "required",
            "visitor_catagory" => "required",
            "to_company" => "required",
            "mobile_no" => "required|digits_between:10,12|unique:tbl_blacklist,mobile_no",
        ];
    }
    public function messages()
    {
        return [
            'mobile_no.required' => 'Mobile Number tidak boleh kosong.',
            'mobile_no.unique' => 'Mobile Number diblokir.',
            'mobile_no.digits_between' => 'Masukan Angka diantara 10 dan 12.',
            'visitor_name.required' => 'Visitor name tidak boleh kosong.',
            'visitor_from.required' => 'Visitor from tidak boleh kosong.',
            'to_company.required' => 'company tidak boleh kosong.',
        ];
    }
}
