<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GetpostModel extends Model
{
    public function scopeGetSize($query, $id)
    {
        return DB::table('product_sizes')
        ->where('product_id', $id)
        ->orderBy('id', 'ASC')
        ->get();
    }
    public function scopeGetColor($query, $id)
    {
        return DB::table('product_colors')
        ->where('product_id', $id)
        ->orderBy('id', 'ASC')
        ->get();
    }
    public function scopeGetImage($query, $id)
    {
        return DB::table('product_images')
        ->where('product_id', $id)
        ->orderBy('id', 'DESC')
        ->get();
    }
    public function scopeAllProduct($query, $limit)
    {
        return DB::table('product')
        ->select(
            'product.id',
            'product.name',
            'product.price',
            'product.discount_in_percent',
            'product.description',
            'product.stock',
            'product.created_at',
            'product_images.image'
        )
        ->join('product_images','product_images.product_id','=','product.id')
        ->orderBy('product.name', 'ASC')
        ->limit($limit)
        ->get();
    }
    public function scopeSearchProduct($query, $q)
    {
        return DB::table('product')
        ->select(
            'product.id',
            'product.name',
            'product.price',
            'product.discount_in_percent',
            'product.description',
            'product.stock',
            'product_images.image'
        )
        ->join('product_images','product_images.product_id','=','product.id')
        ->where('product.name','like',"%{$q}%")
        ->orWhere('product.description','like',"%{$q}%")
        ->orderBy('product.name', 'DESC')
        ->get();
    }
    public function scopeRecentProduct($query, $limit)
    {
    	return DB::table('product')
    	->select(
    		'product.id',
	    	'product.name',
	    	'product.price',
	    	'product.discount_in_percent',
	    	'product.description',
	    	'product.stock',
	    	'product_images.image'
	    )
    	->join('product_images','product_images.product_id','=','product.id')
    	->orderBy('product.id', 'DESC')
    	->limit($limit)
    	->get();
    }
    public function scopeViewProduct($query, $id)
    {
        return DB::table('product')
        ->select(
            'product.id',
            'product.name',
            'product.price',
            'product.discount_in_percent',
            'product.description',
            'product.stock',
            'product.created_at',
            'product.category_id',
            'product_category.id as ctr_id',
            'product_category.name as ctr_name',
            'product_images.image'
        )
        ->join('product_images','product_images.product_id','=','product.id')
        ->join('product_category','product_category.id','=','product.category_id')
        ->where('product.id', $id)
        ->limit(1)
        ->get();
    }
    public function scopeBigDiscount($query, $limit)
    {
    	return DB::table('product')
    	->select(
    		'product.id',
	    	'product.name',
	    	'product.price',
	    	'product.discount_in_percent',
	    	'product.description',
	    	'product.stock',
	    	'product_images.image'
	    )
    	->join('product_images','product_images.product_id','=','product.id')
    	->orderBy('product.discount_in_percent', 'ASC')
    	->limit($limit)
    	->get();
    }
    public function scopePostCategory($query, $ctr)
    {
        return DB::table('product')
        ->select(
            'product.id',
            'product.name',
            'product.price',
            'product.discount_in_percent',
            'product.description',
            'product.stock',
            'product_images.image'
        )
        ->join('product_images','product_images.product_id','=','product.id')
        ->where('product.category_id', $ctr)
        ->orderBy('product.discount_in_percent', 'ASC')
        ->get();
    }
}
