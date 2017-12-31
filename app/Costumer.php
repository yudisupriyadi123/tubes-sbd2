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

    protected $primaryKey = 'email';

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
