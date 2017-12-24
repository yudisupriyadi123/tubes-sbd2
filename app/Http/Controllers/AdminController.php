<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class AdminController extends Controller
{
    //
    function index()
    {
    	return view('admin/dashboard', ['title' => 'Dashboard']);
    }
    function dashboard()
    {
    	return view('admin/dashboard', ['title' => 'Dashboard']);
    }
    function post()
    {
    	return view('admin/post', ['title' => 'Add Product']);
    }
    function orders()
    {
    	return view('admin/orders', ['title' => 'List Orders']);
    }
    function costumers()
    {
    	return view('admin/costumers', ['title' => 'List Costumers']);
    }
    function products()
    {
    	$newest_products =
        Product::orderBy('created_at', 'desc')
            ->take(5)
            ->get();
    	return view('admin/products', ['title' => 'List Products','newest_products' => $newest_products]);
    }
    function categories()
    {
    	return view('admin/categories', ['title' => 'Categories']);
    }
    function setting()
    {
    	return view('admin/setting', ['title' => 'Setting']);
    }
    function info()
    {
    	return view('admin/info', ['title' => 'Info']);
    }
    function profile()
    {
        return view('admin/profile', ['title' => 'Profile']);
    }
    function costumer($idcostumer)
    {
        return view('admin/costumerProfile', ['title' => 'Costumer Profile ',$idcostumer]);
    }
}
