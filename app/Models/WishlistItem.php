<?php namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class WishlistItem extends Model
{

    protected $table = 'wishlist_items';

    protected static $unguarded = true;

    public function wishlist()
    {
        return $this->belongsTo(WishlistItem::class);
    }

    public function user()
    {
        return $this->wishlist->user;
    }

    public function givingCircle()
    {
        return $this->wishlist->givingCircle;
    }

    public function getCostAttribute($value)
    {
        return ptd($value);
    }

    public function setCostAttribute($value)
    {
        $this->attributes['cost'] = $value * 100;
    }
}