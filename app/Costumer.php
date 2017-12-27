<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'costumer';

    protected $primaryKey = 'email';

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
