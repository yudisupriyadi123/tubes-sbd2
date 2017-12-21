<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class MainController extends Controller
{
    //
    function index()
    {
        $newest_products =
        Product::orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $biggest_discount_products =
        Product::orderBy('discount_in_percent', 'desc')
            ->take(5)
            ->get();

    	return view('/home/index', [
            'title' => 'Home',
            'newest_products' => $newest_products,
            'biggest_discount_products' => $biggest_discount_products,
        ]);
    }
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
        //jangan lupa ganti pake related post
        $newest_products =
        Product::orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        return view('/product/index',[
            'title' => 'Product '.$id,
            'newest_products' => $newest_products
        ]
        );
    }
    function category($ctr)
    {
        return view('/category/index',['title' => 'Category '.$ctr]);
    }
    function orderCek()
    {
        return view('/main/cek',['title' => 'Order Cek']);
    }
    function orderProof()
    {
        return view('/main/proof',['title' => 'Order Proof']);
    }
    function cart()
    {
        return view('/cart/index',['title' => 'cart']);
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
