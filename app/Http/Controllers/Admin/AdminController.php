<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class AdminController extends Controller
{
    function layout($path, $title)
    {
        $idadmin = session()->get('idadmin');
        if (!empty($idadmin)) {
            return view($path, ['title' => $title]);
        } else {
            return view('admin/login');
        }
    }
    function index()
    {
        $idadmin = session()->get('idadmin');
        if (!empty($idadmin)) {
            return view('admin/dashboard', ['title' => 'Dashboard']);
        } else {
            return view('admin/login');
        }
    }
    function dashboard()
    {
        $idadmin = session()->get('idadmin');
        if (!empty($idadmin)) {
            return view('admin/dashboard', ['title' => 'Dashboard']);
        } else {
            return view('admin/login');
        }
    }
    function post()
    {
        $idadmin = session()->get('idadmin');
        if (!empty($idadmin)) {
            return view('admin/post', ['title' => 'Add Product']);
        } else {
            return view('admin/login');
        }
    }
    function orders()
    {
        $idadmin = session()->get('idadmin');
        if (!empty($idadmin)) {
            return view('admin/orders', ['title' => 'List Orders']);
        } else {
            return view('admin/login');
        }
    }
    function customers()
    {
        $idadmin = session()->get('idadmin');
        if (!empty($idadmin)) {
            return view('admin/customers', ['title' => 'List Customers']);
        } else {
            return view('admin/login');
        }
    }
    function products()
    {
        $idadmin = session()->get('idadmin');
        if (!empty($idadmin)) {
            $newest_products =
            Product::orderBy('created_at', 'desc')
                ->take(5)
                ->get();
            return view('admin/products', ['title' => 'List Products','newest_products' => $newest_products]);
        } else {
            return view('admin/login');
        }
    }
    function categories()
    {
        $idadmin = session()->get('idadmin');
        if (!empty($idadmin)) {
            return view('admin/categories', ['title' => 'Categories']);
        } else {
            return view('admin/login');
        }
    }
    function setting()
    {
        $idadmin = session()->get('idadmin');
        if (!empty($idadmin)) {
            return view('admin/setting', ['title' => 'Setting']);
        } else {
            return view('admin/login');
        }
    }
    function info()
    {
        $idadmin = session()->get('idadmin');
        if (!empty($idadmin)) {
            return view('admin/info', ['title' => 'Info']);
        } else {
            return view('admin/login');
        }
    }
    function profile()
    {
        $idadmin = session()->get('idadmin');
        if (!empty($idadmin)) {
            return view('admin/profile', ['title' => 'Profile']);
        } else {
            return view('admin/login');
        }
    }
    function customer($idcustomer)
    {
        $idadmin = session()->get('idadmin');
        if (!empty($idadmin)) {
            return view('admin/customerProfile', ['title' => 'Customer Profile ',$idcustomer]);
        } else {
            return view('admin/login');
        }
    }
}
