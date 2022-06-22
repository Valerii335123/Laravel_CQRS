<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseRequest;
use App\Rules\PasswordRegexRule;


/**
 * @property-read $name
 * @property-read $email
 * @property-read $password
 */
class RegistrationRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
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
            'name'                  => ['required'],
            'email'                 => ['required', 'email', 'unique:users,email'],
            'password'              => ['required', 'string', 'confirmed', 'min:8', new PasswordRegexRule()],
            'password_confirmation' => ['required', 'string'],

        ];
    }
}
