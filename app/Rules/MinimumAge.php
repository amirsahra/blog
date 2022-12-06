<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class MinimumAge implements Rule
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
    public function passes($attribute, $value)
    {
        $generateDate = date("m/d/Y", strtotime("+10 years", strtotime($value)));
        $currentDate = date('m/d/Y');

        if (strtotime($generateDate) > strtotime($currentDate))
            return false;
        else
            return true;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('messages.register_page.minimum_age');
    }
}
