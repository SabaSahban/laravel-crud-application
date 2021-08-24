<?php

namespace App\Http\Requests\Property;

use Illuminate\Foundation\Http\FormRequest;

class Edit extends FormRequest
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
    public function rules(): array
    {
        return [
            'name'=>'string|min:3',
            'show_name'=>'string|min:3',
            'explorer'=>'string|min:3',
            'show_order'=>'integer',
            'deposit'=>'numeric|min:1000',
            'withdraw'=>'numeric|min:1000',
            'has_tag'=>'boolean',
            'withdraw_min'=>'numeric|min:0.001',
            'withdraw_fee'=>'numeric|min:0.001',
            'deposit-min'=>'numeric|min:0.001',
        ];
    }
}
