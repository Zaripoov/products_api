<?php

namespace App\Http\Requests\Api\V1;

use App\Rules\PhoneRule;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public ?string $type = null;

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
        $rules = [
            'login' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8'],
        ];

        if(preg_match("/[0-9a-z]+@[a-z]/", $this->getLogin())){
            $rules['login'][] = ['email', 'min:3', 'max:255'];
            $this->setType('email');
        }else{
            $rules['login'] = ['min:5', 'max:15', new PhoneRule];
            $this->setType('phone');
        }

        return $rules;
    }

    public function getLogin()
    {
        return $this->get('login');
    }

    public function getPasswordUser()
    {
        return $this->get('password');
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }
}
