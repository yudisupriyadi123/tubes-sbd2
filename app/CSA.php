<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CSA extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customer_shipping_addresses';

    public $timestamps = false;
}
