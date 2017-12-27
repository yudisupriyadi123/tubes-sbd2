<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product';

    /**
     * Return the newest product created
     *
     * @param integer $max_record   maximum record to fetch
     */
    static function getNewests($max_record)
    {
        return Self::orderBy('created_at', 'desc')
                    ->take($max_record)
                    ->get();
    }

    /**
     * Return the biggest discounted product
     *
     * @param integer $max_record   maximum record to fetch
     */
    static function getBiggestDiscounted($max_record)
    {
        return Self::orderBy('discount_in_percent', 'desc')
                    ->take($max_record)
                    ->get();
    }
}
