<?php

namespace App\Traits;

use App\Mail\SendAuthCodeMail;
use App\Models\User;
use Mail;

trait HasAuthCode
{
    public function sendAuthCodeToMail(string $email,int $authenticationCode)
    {
        $details = [
            'title' => 'Mail from dornica.com',
            'body' => 'To confirm the authentication code, click on the link below and enter the following code in the corresponding box on the page that opens',
            'code' => $authenticationCode,
        ];

        Mail::to($email)->send(new SendAuthCodeMail($details));
    }
}
