<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Rules\MinimumAge;
use App\Rules\Nationalcode;
use App\Rules\PersianCaptcha;
use App\Traits\HasAuthCode;
use App\Traits\UploadImage;
use Hekmatinasser\Verta\Verta;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules, UploadImage,HasAuthCode;

    /**
     * Validate and create a newly registered user.
     *
     * @param array $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        $this->validate($input);
        $user = $this->insertUser($input);
        //$this->sendAuthCodeToMail($user->email,$user['authentication_code']);
        return $user;
    }

    private function validate(array $input)
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'birthday' => ['date', new MinimumAge],
            'username' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z]+$/u', Rule::unique(User::class)],
            'phone' => ['required', 'digits:11',
                'regex:/(0|\+98)?([ ]|-|[()]){0,2}9[1|2|3|4]([ ]|-|[()]){0,2}(?:[0-9]([ ]|-|[()]){0,2}){8}/',
                Rule::unique(User::class)
            ],
            'nationality_code' => ['required', new Nationalcode, 'max:10', Rule::unique(User::class)],
            'gender' => ['required', 'in:female,male'],
            'military' => ['required_if:gender,male'],
            'province_id' => ['required', 'exists:provinces,id'],
            'city_id' => ['required', 'exists:cities,id'],
            're_captcha' => ['required', 'numeric', new PersianCaptcha($input['captcha'])],
            'avatar' => ['mimes:jpeg,png,jpg,gif,svg', 'max:200'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class),],
            'password' => ['required', 'min:6'],
        ])->validate();
    }

    private function insertUser(array $input)
    {
        if (array_key_exists('avatar', $input))
            $avatar = $this->uploadImage($input['avatar'], 'avatar');

        return User::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            //'birthday' => date('m-d-Y',$input['birthday']),
            'birthday' => $input['birthday'],
            'username' => $input['username'],
            'phone' => $input['phone'],
            'nationality_code' => $input['nationality_code'],
            'gender' => $input['gender'],
            'military' => $input['military'] ?? null,
            'province_id' => $input['province_id'],
            'city_id' => $input['city_id'],
            'avatar' => $avatar ?? null,
            'email' => $input['email'],
            'authentication_code' => rand(9999,99999),
            'password' => Hash::make($input['password']),
            'created_at' => Verta::now(),
        ]);
    }
}
