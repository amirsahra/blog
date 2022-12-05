<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Nationalcode implements Rule
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
        $cDigitLast = substr($value , strlen($value)-1);
        $fMeli = strval(intval($value));

        if((str_split($fMeli))[0] == "0" && !(8 <= strlen($fMeli)  && strlen($fMeli) < 10)) return false;

        $nineLeftDigits = substr($value , 0 , strlen($value) - 1);

        $positionNumber = 10;
        $result = 0;

        foreach(str_split($nineLeftDigits) as $chr){
            $digit = intval($chr);
            $result += $digit * $positionNumber;
            $positionNumber--;
        }

        $remain = $result % 11;

        $controllerNumber = $remain;

        if(2 < $remain){
            $controllerNumber = 11-$remain;
        }

        return $cDigitLast == $controllerNumber;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('messages.register_page.nationality');
    }
}
