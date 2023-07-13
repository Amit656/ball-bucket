<?php

namespace App\Http\Requests;

use App\Rules\SuggestBucketRule;
use Illuminate\Foundation\Http\FormRequest;

class SuggestBucketRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'balls' => ['required', 'array'],
            'balls' => new SuggestBucketRule,
            'balls.*.value' =>'required|integer|min:1|max:100',
        ];
    }
}
