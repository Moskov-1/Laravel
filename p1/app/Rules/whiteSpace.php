<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class whiteSpace implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $len = strlen($value);
        for($i =0; $i<$len; $i++){
            if($value[$i] === " "){
                $fail("The :attribute can not have whitespaces.");
            }

        }
    }


}
