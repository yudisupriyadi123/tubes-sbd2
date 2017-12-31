<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Transaction;
use App\TransactionDetail;
use App\Costumer;
use App\Cart;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    function shops()
    {
    	return view('/shops/index',['title' => 'All Products']);
    }
    function recent()
    {
        return view('/shops/index',['title' => 'Recently Posts']);
    }
    function top()
    {
    	return view('/shops/index',['title' => 'Popular Posts']);
    }
    function popular()
    {
    	return view('/shops/index',['title' => 'Most Viewed']);
    }
    function search()
    {
        $ctr = $_GET['q'];
        return view('/search/index',['title' => $ctr]);
    }
    function product($id)
    {
        // TODO: jangan lupa ganti khusu untuk admin
        $product = Product::find($id);
        $product_sizes = $product->sizes;
        $product_colors = $product->colors;
        $product_images = $product->images;
        $product_thumbnail = $product->thumbnail;

        return view('/product/index',[
            'title' => 'Product '.$product->name,
            'product' => $product,
            'product_sizes' => $product_sizes,
            'product_colors' => $product_colors,
            'product_images' => $product_images,
            'product_thumbnail' => $product_thumbnail,
        ]);
    }
    function category($ctr)
    {
        return view('/category/index',['title' => 'Category '.$ctr]);
    }
    function purchase($idcart)
    {
        return view('/purchase/index',['title' => 'Purchase '.$idcart]);
    }
    function puchaseAll()
    {
        return view('/purchase/index',['title' => 'Purchase All']);
    }
    function signin()
    {
        return view('/sign/in',['title' => 'Signin']);
    }
    function signup()
    {
        return view('/sign/up',['title' => 'Signup']);
    }
}
