<?php

namespace App\Http\Requests\Property;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules():array
    {
        return [
            'name'=>'required|string|min:3',
            'show_name'=>'required|string|min:3',
            'explorer'=>'required|string|min:3',
            'show_order'=>'required|integer',
            'deposit'=>'required|numeric|min:1000',
            'withdraw'=>'required|numeric|min:1000',
            'has_tag'=>'required|boolean',
            'withdraw_min'=>'required|numeric|min:0.001',
            'withdraw_fee'=>'required|numeric|min:0.001',
            'deposit_min'=>'required|numeric|min:0.001',
        ];
    }

}
