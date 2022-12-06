<?php

namespace App\Traits;

use Illuminate\Support\Facades\Config;

trait Studiable
{

    public function calculationOfTextReadingTime(string $text)
    {
        $wordCount = str_word_count($text);
        return ceil($wordCount / Config::get('dornicasettings.word_length'));
    }

}
