<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

/**
 * Essa classe deve ser utilizada em requisições form-data para validar campos "boolean"
 */
class IsBooleanCustomRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!$this->validationRule($value)) {
            $fail("O campo {$attribute} deve ser do tipo boolean");
        }
    }

    private function validationRule(mixed $value): bool
    {
        if (!isset($value) || is_null($value)) {
            return false;
        }

        return in_array($value, [true, false, 'true', 'false', 0, 1, '0', '1'], true);
    }
}
