<?php

namespace App\Traits;

trait PersianCaptcha
{
    private $en = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
    private $fa = array("۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹");

    public function generateCaptcha()
    {
        $randomNumber = rand(99999, 100000000);
        return $this->convertNumberToPersian($randomNumber);
    }

    public function validationCaptcha(string $captcha, string $reCaptcha): bool
    {
        $persianReCaptcha = $reCaptcha;
        if (!$this->checkPersianNumber($persianReCaptcha))
            $persianReCaptcha = $this->convertNumberToPersian($persianReCaptcha);

        if ($captcha == $persianReCaptcha)
            return true;
        else
            return false;
    }

    public function convertNumberToPersian(int $number)
    {
        if (!$this->checkNumeric($number))
            return '.';

        return str_replace($this->en, $this->fa, $number);
    }

    public function convertNumberToEnglish(int $number)
    {
        if (!$this->checkNumeric($number))
            return '.';

        return str_replace($this->fa, $this->en, $number);
    }

    private function checkNumeric(int $number): bool
    {
        if (!is_numeric($number) || empty($number))
            return false;
        return true;
    }

    private function checkPersianNumber(int $number): bool
    {
        if (preg_match('/^[^\x{600}-\x{6FF}]+$/u', str_replace("\\\\", "", $number)))
            return false;
        return true;
    }
}
