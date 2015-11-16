<?php namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class GivingCircle extends Model
{
    protected $table = 'giving_circles';

    protected static $unguarded = true;

    public static $roles = [
        'owner' => 0,
        'member' => 1
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function items()
    {
        return $this->hasManyThrough(WishlistItem::class, Wishlist::class);
    }
}