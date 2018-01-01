<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CategoryModel extends Model
{
	protected $table = 'product_category';
    public function scopeGet($query)
    {
    	return DB::table('product_category')
    	->orderBy('parent_category','desc')
    	->get();
    }
    public function scopeGetVal($query, $limit)
    {
        return DB::table('product_category')
        ->orderBy('parent_category','desc')
        ->limit($limit)
        ->get();
    }
    public function scopeCtrDelete($query, $id)
    {
    	return DB::table('product_category')
    	->where('id', $id)
    	->delete();
    }
    public function scopeAddParent($query, $data)
    {
    	return DB::table('product_category')
    	->insert($data);
    }
}
