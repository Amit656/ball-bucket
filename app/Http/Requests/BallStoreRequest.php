<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BallStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:balls,name',
            'volume' => 'required|numeric|max:999999.99'
        ];
    }
}
