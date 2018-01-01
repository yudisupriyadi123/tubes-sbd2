<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Costumer extends Authenticatable
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'costumer';

    /**
     * By default, laravel assume 'id' as primary key column.
     *
     * @var string
     */
    protected $primaryKey = 'email';

    /**
     * Will stop laravel to assume the primary key is AUTO INCREMENT.
     * Important when use Auth::user()
     *
     * @var string
     */
    public $incrementing = false;

    /**
     * I do not need and not created column 'created_at' and 'updated_at'.
     * @var string
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'address', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function cart()
    {
        return $this->hasMany('App\Cart', 'costumer_email');
    }

    static function getCartItemsWithJoinProduct($costumer_email)
    {
        return Self::find($costumer_email)
                    ->cart()
                    ->join('product AS prod', 'prod.id', '=', 'cart.product_id');
    }
}
