<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_category';

    /**
     * By default, laravel assume 'id' as primary key column.
     *
     * @var string
     */
    protected $primaryKey = 'id';
}
