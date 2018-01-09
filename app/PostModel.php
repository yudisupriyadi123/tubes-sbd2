<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PostModel extends Model
{
    //
    protected $table = 'product';

    public function scopePostProduct($query, $data)
    {
        # code...
        return DB::table('product')
        ->insert($data);
    }
    public function scopeGetProductId($query)
    {
        # code...
        return DB::table('product')
        ->orderBy('id', 'desc')
        ->limit(1)
        ->value('id');
    }
    public function scopePostImage($query, $data)
    {
      return DB::table('product_images')
        ->insert($data);
    }
    public function scopePostSize($query, $data)
    {
      return DB::table('product_sizes')
        ->insert($data);
    }
    public function scopePostColor($query, $data)
    {
      return DB::table('product_colors')
        ->insert($data);
    }
    public function scopePostSettingUp($query, $id, $data)
    {
      return DB::table('product')
      ->where('product.id','=',$id)
        ->update($data);
    }
    public function scopeGetImageListId($query, $id)
    {
        return DB::table('product_images')
        ->where('product_images.product_id','=',$id)
        ->orderBy('id', 'desc')
        ->limit(1)
        ->value('id');
    }
}
