<?php

namespace App\Traits;

trait HasAccessLevel
{
    public function checkAccessRole(string $role)
    {
        return redirect()->route('home');
        //if(auth()->user()->hasRole($role))
            //return route('home');
    }
}
