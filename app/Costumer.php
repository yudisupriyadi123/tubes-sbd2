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
}
