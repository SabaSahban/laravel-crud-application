<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class Search extends FormRequest
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
    #[ArrayShape(['currency_name' => "string", 'show_name' => "string"])] public function rules()
    {
        return [
            'currency_name'=>'string|min:3|nullable',
            'show_name'=>'string|min:3|nullable',
        ];
    }
}
