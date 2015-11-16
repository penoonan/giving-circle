<?php namespace App\Http\Controllers;


class UserController extends Controller
{
    public function profile()
    {
        $user = app('auth')->user();
        $user->with('wishlist');
        $list = $user->wishlist->transform(function($item) {
            return [
                'name' => $item->name,
                'cost' => $item->cost,
                'url' => $item->url
            ];
        });
        app('javascript')->put('user', $user->getAttributes() + ['wishlist' => $list]);
        return view('profile');
    }
}