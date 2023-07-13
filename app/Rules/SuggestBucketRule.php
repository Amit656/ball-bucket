<?php

namespace App\Rules;

use Closure;
use App\Models\BallModel;
use Illuminate\Contracts\Validation\ValidationRule;

class SuggestBucketRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(BallModel::whereIn('id', collect($value)->pluck('id')->toArray())->count() != BallModel::count()){
            $fail('Invalid Balls');
        }
    }
}
