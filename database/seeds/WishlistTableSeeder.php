<?php

use App\Models\Wishlist;
use Illuminate\Database\Seeder;

class WishlistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Wishlist::create([
            'user_id' => 1,
            'giving_circle_id' => 1
        ]);
    }
}
