<?php

namespace App\Http\Requests\Api\V1;

use App\Rules\PasswordRule;
use App\Rules\PhoneRule;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'string', 'min:3', 'max:255'],
            'phone' => ['required', 'string', 'min:5', 'max:20', new PhoneRule],
            'password' => ['required', new PasswordRule, 'confirmed'],
        ];
    }

    public function getEmail()
    {
        return $this->get('email');
    }

    public function getPhone()
    {
        return $this->get('phone');
    }

    public function getPasswordUser()
    {
        return $this->get('password');
    }




}
