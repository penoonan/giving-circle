<?php namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Created by PhpStorm.
 * User: patricknoonan
 * Date: 11/15/15
 * Time: 7:24 PM
 */
class Wishlist extends Model
{
    protected $table = 'wishlists';

    protected $fillable = ['user_id', 'title', 'link', 'cost'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function givingCircle()
    {
        return $this->belongsTo(GivingCircle::class);
    }

    public function items()
    {
        return $this->hasMany(WishlistItem::class);
    }
}