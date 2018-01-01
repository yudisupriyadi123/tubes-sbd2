<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class AdminController extends Controller
{
    function layout($path, $title)
    {
        return view($path, ['title' => $title]);
    }
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
    function customers()
    {
        return view('admin/customers', ['title' => 'List Customers']);
    }
    function products()
    {
        $newest_products =
        Product::orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('admin/products', [
            'title' => 'List Products',
            'newest_products' => $newest_products,
        ]);
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
    function customer($idcustomer)
    {
        return view('admin/customerProfile', ['title' => 'Customer Profile ',$idcustomer]);
    }
}
