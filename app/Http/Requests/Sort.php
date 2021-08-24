<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class Sort extends FormRequest
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
    #[ArrayShape(['show_order' => "string", 'withdraw' => "string", 'deposit' => "string"])] public function rules(): array
    {
        return [
            'show_order'=>'nullable|integer',
            'withdraw'=>'nullable|numeric|min:1000',
            'deposit'=>'nullable|numeric|min:1000'
        ];
    }
}
