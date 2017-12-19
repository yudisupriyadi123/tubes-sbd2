<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    function index()
    {
    	return view('/home/index',['title' => 'Home']);
    }
    function shops()
    {
    	return view('/shops/index',['title' => 'All Products']);
    }
    function top()
    {
    	return view('/shops/index',['title' => 'Top Rated']);
    }
    function popular()
    {
    	return view('/shops/index',['title' => 'Popular']);
    }
    function product($id)
    {
        return view('/product/index',['title' => 'Product '.$id]);
    }
    function orderCek()
    {
        return view('/main/cek',['title' => 'Order Cek']);
    }
    function orderProof()
    {
        return view('/main/proof',['title' => 'Order Proof']);
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
