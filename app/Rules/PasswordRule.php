<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class PasswordRule implements Rule
{

    protected int $length = 8;

    protected bool $requireUppercase = true;

    protected bool $requireNumeric = true;

    protected bool $requireSpecialCharacter = false;

    protected ?string $message = null;


    public function passes($attribute, $value): bool
    {
        $value = is_scalar($value) ? (string)$value : '';

        if ($this->requireUppercase && Str::lower($value) === $value) {
            return false;
        }

        if ($this->requireNumeric && !preg_match('/[0-9]/', $value)) {
            return false;
        }

        if ($this->requireSpecialCharacter && !preg_match('/[\W_]/', $value)) {
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
        if (!is_null($this->message)) {

            return $this->message;
        }

        switch (true) {
            case $this->requireUppercase
                && !$this->requireNumeric
                && !$this->requireSpecialCharacter:
                return __('The :attribute must be at least :length characters and contain at least one uppercase character.', [
                    'length' => $this->length,
                ]);

            case $this->requireNumeric
                && !$this->requireUppercase
                && !$this->requireSpecialCharacter:
                return __('The :attribute must be at least :length characters and contain at least one number.', [
                    'length' => $this->length,
                ]);

            case $this->requireSpecialCharacter
                && !$this->requireUppercase
                && !$this->requireNumeric:
                return __('The :attribute must be at least :length characters and contain at least one special character.', [
                    'length' => $this->length,
                ]);

            case $this->requireUppercase
                && $this->requireNumeric
                && !$this->requireSpecialCharacter:
                return __('The :attribute must be at least :length characters and contain at least one uppercase character and one number.', [
                    'length' => $this->length,
                ]);

            case $this->requireUppercase
                && $this->requireSpecialCharacter
                && !$this->requireNumeric:
                return __('The :attribute must be at least :length characters and contain at least one uppercase character and one special character.', [
                    'length' => $this->length,
                ]);

            case $this->requireUppercase
                && $this->requireNumeric
                && $this->requireSpecialCharacter:
                return __('The :attribute must be at least :length characters and contain at least one uppercase character, one number, and one special character.', [
                    'length' => $this->length,
                ]);

            case $this->requireNumeric
                && $this->requireSpecialCharacter
                && !$this->requireUppercase:
                return __('The :attribute must be at least :length characters and contain at least one special character and one number.', [
                    'length' => $this->length,
                ]);

            default:
                return __('The :attribute must be at least :length characters.', [
                    'length' => $this->length,
                ]);
        }
    }

    public function length(int $length): PasswordRule
    {
        $this->length = $length;

        return $this;
    }
}
