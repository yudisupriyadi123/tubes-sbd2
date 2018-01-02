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

    static function getAll($max_record)
    {
        return Self::all()->take($max_record);
    }

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

    static function getByCategory($category_id)
    {
        return Self::where('category_id', '=', $category_id)->get();
    }

    static function search($keyword)
    {
        return Self::where('name', 'like', "%${keyword}%")->get();
    }

    public function getDiscountedPrice()
    {
        return $this->price - ($this->price * ($this->discount_in_percent/100));
    }

    public function sizes()
    {
        return $this->hasMany('\App\ProductSizes', 'product_id', 'id');
    }

    public function colors()
    {
        return $this->hasMany('\App\ProductColors', 'product_id', 'id');
    }

    public function images()
    {
        return $this->hasMany('\App\ProductImages', 'product_id', 'id');
    }

    public function thumbnail()
    {
        return $this->hasOne('\App\ProductImages', 'id', 'thumbnail_image_id');
    }
}
