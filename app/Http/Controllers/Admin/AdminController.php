<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\CategoryModel;
use App\Transaction;
use App\Customer;

class AdminController extends Controller
{
    function layout($path, $title)
    {
        return view($path, ['title' => $title]);
    }
    function index()
    {
        return redirect('admin/dashboard');
    }
    function dashboard()
    {
        $max_item = 5;

        $need_approved_orders = Transaction::getNeedApproved($max_item);
        $customers = Customer::all()->take($max_item);

        return view('admin/dashboard', [
            'title' => 'Dashboard',
            'need_approved_orders' => $need_approved_orders,
            'customers' => $customers,
        ]);
    }
    function post()
    {
        $ctr = CategoryModel::Get();

        return view('admin/post', [
            'title' => 'Add Product',
            'category' => $ctr,
        ]);
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
