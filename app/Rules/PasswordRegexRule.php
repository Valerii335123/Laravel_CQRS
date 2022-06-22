<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PasswordRegexRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        if (empty($value)) {
            return true;
        }

        return preg_match('/(?=.*[0-9])(?=.*[!@#$%^&*№;:?+_])(?=.*[a-zа-я])(?=.*[A-ZА-Я])/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('The password must contain special characters, numbers, letters of different case');
    }
}
