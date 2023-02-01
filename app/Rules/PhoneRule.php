<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class PhoneRule implements Rule
{
    protected int $length = 12;

    protected bool $requireNumber = true;


    public function passes($attribute, $value): bool
    {
        $value = is_scalar($value) ? (string)$value : '';

        if ($this->requireNumber && !preg_match("/^\+?7\d{10}$/", trim($value))) {
            return false;
        }

        return Str::length($value) >= $this->length;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'Format: +79998754654';
    }
}
