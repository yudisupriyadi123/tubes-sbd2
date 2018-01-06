<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\CategoryModel;

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
        $ctr = CategoryModel::Get();

        return view('admin/post', [
            'title' => 'Add Product',
            'category' => $ctr,
        ]);
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
        $max_product = 100;
        $products = Product::getAll($max_product);

        return view('admin/products', [
            'title' => 'List Products',
            'products' => $products,
        ]);
    }
    function categories()
    {
        $ctr = CategoryModel::Get();

        return view('admin/categories', [
            'title' => 'Categories',
            'category' => $ctr,
        ]);
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
        $max_product = 100;
        $products = Product::getAll($max_product);

        return view('admin/profile', [
            'title' => 'Profile',
            'products' => $products,
        ]);
    }
    function customer($idcustomer)
    {
        return view('admin/customerProfile', ['title' => 'Customer Profile ',$idcustomer]);
    }
}
