<?php

use App\Models\WishlistItem;
use Illuminate\Database\Seeder;

class WishlistItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WishlistItem::create([
            'wishlist_id' => 1,
            'name' => 'Socks!',
            'url' => 'http://www.sockdreams.com',
            'cost' => 10000
        ]);
    }
}
