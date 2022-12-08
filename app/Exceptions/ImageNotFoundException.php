<?php

namespace App\Exceptions;

use Exception;

class ImageNotFoundException extends Exception
{
    protected $message = 'The image path is wrong or an image with this name does not exist.';
}
