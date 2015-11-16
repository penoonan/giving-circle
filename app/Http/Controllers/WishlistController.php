<?php namespace App\Http\Controllers;


use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidatesWhenResolvedTrait;

class WishlistController extends Controller
{

    use ValidatesWhenResolvedTrait;

    public function store($id, Request $request)
    {
        $rules = [
            'name' => 'required',
            'cost' => 'numeric',
            'url' => 'url'
        ];

        $this->validate($request, $rules);

        $item = new Wishlist($request->only(['name', 'cost', 'url']));

        app('auth')->user()->wishlist()->save($item);

        return redirect()->route('profile');
    }

}