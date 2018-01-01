<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    function index()
    {
        $max_product = 5;
        $newest_products = Product::getNewests($max_product);
        $biggest_discount_products = Product::getBiggestDiscounted($max_product);

        return view('/home/index', [
            'title' => 'Home',
            'newest_products' => $newest_products,
            'biggest_discount_products' => $biggest_discount_products,
        ]);
    }
}
