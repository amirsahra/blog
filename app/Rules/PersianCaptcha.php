<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PersianCaptcha implements Rule
{
    use \App\Traits\PersianCaptcha;

    private $captcha;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($captcha)
    {
        $this->captcha = $captcha;
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
        if ($this->validationCaptcha($this->captcha, $value))
            return true;
        else
            return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The captcha code entered is not correct.';
    }
}
