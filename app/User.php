<?php namespace App;

use App\Models\GivingCircle;
use App\Models\Wishlist;
use App\Models\WishlistItem;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{

    use AuthenticatableTrait, CanResetPassword;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'first_name', 'last_name'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function givingCircles()
    {
        return $this->belongsToMany(GivingCircle::class)->withTimestamps();
    }

    public function items()
    {
        return $this->hasManyThrough(WishlistItem::class, Wishlist::class);
    }

}