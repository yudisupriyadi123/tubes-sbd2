<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cart';

    public $timestamps = false;

    public function product()
    {
        return $this->hasOne('App\Product', 'id', 'product_id');
    }

    public function costumer()
    {
        return $this->hasOne('App\Costumer');
    }

    static function getWithJoinProductByIds($cart_ids)
    {
        return Cart::whereIn('cart.id', $cart_ids)
                    ->join('product AS prod', 'prod.id', '=', 'cart.product_id');
    }
}
