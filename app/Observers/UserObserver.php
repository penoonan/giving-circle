<?php namespace App\Observers;

use App\User;

/**
 * Created by PhpStorm.
 * User: patricknoonan
 * Date: 11/15/15
 * Time: 1:17 PM
 */
class UserObserver
{

    public function saving(User $user)
    {
        if ($user->isDirty('password')) {
            $pass = $user->password;
            $user->setAttribute('password', app('hash')->make($pass));
        }
    }
}