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
            "name" => ["required"],
            "zip_code" => ["required"],
            "address1" => ["required"],
            "address2" => ["nullable"],
            "telephone" => ["required"],
            "dept1" => ["required"],
            "dept2" => ["nullable"],
            "in_charge_id" => ["required"],
            "payment_method" => ["required"],
            "billingdate" => ["required"],
            "paymentdate" => ["required"],
            "remark" => ["nullable"],
            "remark2"=>["nullable"],
            "remark3"=>["nullable"],
            "noti" => ["nullable"],
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
            'name.required' => '名前を入力してください',
            'address1.required' => '住所を入力してください',
            'zip_code.required' => '郵便番号を入力してください',
            'telephone.required' => '電話番号を入力してください',
            'dept1.required' => '部署を入力してください',
            'in_charge_id.required' => '担当者氏名を選択してください',
            'billingdate.required' => '請求締日を選択してください',
            'paymentdate.required' => '支払期日を選択してください',
        ];
        
    }
   
}
