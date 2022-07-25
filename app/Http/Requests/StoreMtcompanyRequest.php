<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMtcompanyRequest extends FormRequest
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
                
                "company_name" => ["required"],
                "zipcode" => ["required"],
                "address1" => ["required"],
                "address2" => ["nullable"],
                "tel" => ["required"],
                "department1" => ["required"],
                "department2" => ["nullable"],
                "incharge_id" => ["required"],
                "kessai" => ["nullable"],
                "seikyu_shimebi" => ["required"],
                "kijitsu" => ["required"],
                "remark" => ["nullable"],
                "remark2"=>["nullable"],
                "remark3"=>["nullable"],
                "email_send" => ["nullable"],
            ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        
        return [
            'company_name.required' => '名前を入力してください',
            'address1.required' => '住所を入力してください',
            'zipcode.required' => '郵便番号を入力してください',
            'tel.required' => '電話番号を入力してください',
            'department1.required' => '部署を入力してください',
            'incharge_id.required' => '担当者氏名を選択してください',
            'payment_id.required' => '請求締日を選択してください',
            'kijitsu.required' => '支払期日を選択してください',
        ];
        
    }
}
