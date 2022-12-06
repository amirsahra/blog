<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Rules\MinimumAge;
use App\Rules\Nationalcode;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param array $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {

        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'birthday' => ['date', new MinimumAge],
            'username' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z]+$/u', Rule::unique(User::class)],
            'phone' => ['required', 'digits:11', 'regex:/(0|\+98)?([ ]|-|[()]){0,2}9[1|2|3|4]([ ]|-|[()]){0,2}(?:[0-9]([ ]|-|[()]){0,2}){8}/', Rule::unique(User::class)],
            'nationality_code' => ['required', new Nationalcode, 'max:10', Rule::unique(User::class)],
            'gender' => ['required', 'in:female,male'],
            'military' => ['required_if:gender,male'],
            'avatar' => ['mimes:jpeg,png,jpg,gif,svg', 'max:200'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class),],
            'password' => $this->passwordRules(),
        ])->validate();

        $avatarPath = 'panel/avatars/';
        $avatar = $avatarPath . 'default.png';
        if (in_array('avatar', $input)) {
            $imageName = time() . '.' . $input['avatar']->getClientOriginalExtension();
            $input['avatar']->image->move(public_path($avatarPath), $imageName);
            $avatar = $avatarPath . $imageName;

            $img = Image::make($avatar);
            $img->resize(400, 400, function ($const) {
                $const->aspectRatio();
            })->save($avatar);
        } //TODO test and refactor

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'created_at'=> Verta::now(),
        ]);
    }
}
