<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;
    use SoftDeletes;
    use Sortable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'is_active',
        'photo_id',
        'provider_id',
        'provider',
        'avatar',
    ];

    public $sortable = ['id', 'name', 'email', 'role', 'is_active', 'username'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role');
    }

    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function ordersdetails()
    {
        return $this->hasMany(Order::class);
    }

    public function addresses()
    {
        return $this->belongsToMany(Address::class, 'user_address');
    }

    public function delivers()
    {
        return $this->hasMany(Deliver::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }


    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function reviewreplies()
    {
        return $this->hasMany(Review::class);
    }

    // Deze functie gebruiken we om een relatie te maken van USER naar ORDERDETAIL via ORDERS
    /*public function orderdetails()
    {
        return $this->hasManyThrough(Orderdetail::class, Order::class);
    }*/

    // Deze functie gebruiken we bij onze Gates om te controleren welke Role onze User heeft
    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()){
            return true;
        }
        return false;
    }

    public function isAdmin(){
        foreach($this->roles as $role){
            if($role->name == 'administrator' && $this->is_active == 1 ){
                return true;
            }
        }
    }

    public function isUser(){
        foreach($this->roles as $role){
            if($role->name == 'administrator' || $role->name == 'customer' ){
                return true;
            }
        }
    }

    public function permissions()
    {
        return $this->roles->map->permissions->flatten()->pluck('name')->unique();
    }





}
