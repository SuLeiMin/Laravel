<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            "name" => ["required"],
            "zip_code" => ["required"],
            "address1" => ["required"],
            "address2" => ["nullable"],
            "telephone" => ["required"],
            "dept1" => ["required"],
            "dept2" => ["nullable"],
            "in_charge_id" => ["required"],
            "payment_method" => ["required"],
            "deadline1" => ["required"],
            "deadline2" => ["required"],
            "remark" => ["nullable"],
            "remark2"=>["nullable"],
            "remark3"=>["nullable"],
            "noti" => ["nullable"],
        ];
    }
}
