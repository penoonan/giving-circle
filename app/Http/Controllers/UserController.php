<?php namespace App\Http\Controllers;


use App\Models\GivingCircle;
use App\User;

class UserController extends Controller
{
    public function profile()
    {
        $user_id = app('auth')->user()->getKey();

        $user = User::with('wishlists', 'wishlists.givingCircle', 'wishlists.items')
            ->where('id', '=', $user_id)
            ->get()
            ->first()
        ;

        js([
            'user' => $user->getAttributes(),
            'wishlists' => $user->wishlists->toArray()
        ]);
        return view('profile', ['user' => $user]);
    }
}