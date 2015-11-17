<?php namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\WishlistItem;
use Illuminate\Validation\ValidatesWhenResolvedTrait;
use Laravel\Lumen\Routing\ValidatesRequests;

class WishlistItemController extends Controller
{
    use ValidatesRequests;

    public function show($wishlist_id, $item_id)
    {
        $item = $this->getWishlistItem($wishlist_id, $item_id);
    }

    public function edit($wishlist_id, $item_id)
    {
        $item = $this->getWishlistItem($wishlist_id, $item_id);
        return view('wishlist.item.edit', ['item' => $item]);
    }

    public function update($wishlist_id, $item_id)
    {
        $item = $this->getWishlistItem($wishlist_id, $item_id);

    }

    public function destroy($wishlist_id, $item_id)
    {
        $item = $this->getWishlistItem($wishlist_id, $item_id);
        $item->delete();
        return redirect()->route('profile');
    }

    protected function getWishlistItem($wishlist_id, $item_id)
    {
        $item = WishlistItem::where('id', '=', $item_id)
            ->where('wishlist_id', '=', $wishlist_id)
            ->get()
            ->first();

        if (!$item) {
            app()->abort(404, 'Page not found');
        }

        return $item;
    }

}