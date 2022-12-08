<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait HasAvatar
{
    public function uploadAvatar()
    {
        $avatarPath = 'panel/avatars/';

        $avatar = $avatarPath . 'default.png';
            $imageName = time() . '.' . $input['avatar']->getClientOriginalExtension();
            $input['avatar']->move(public_path($avatarPath), $imageName);
            $avatar = $avatarPath . $imageName;

            /*$img = Image::make($avatar);
            $img->resize(400, 400, function ($const) {
                $const->aspectRatio();
            })->save($avatar)
            */
            //TODO resize
    }
}
