<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class EnumRule implements ValidationRule
{
    protected $enumValues;

    public function __construct(array $enumValues)
    {
        $this->enumValues = $enumValues;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!in_array($value, $this->enumValues)) {
            $fail('The selected ' . $attribute . ' is invalid. Valid values: ' . implode(', ', $this->enumValues) . '.');
        }
    }
}
