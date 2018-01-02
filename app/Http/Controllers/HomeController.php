<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\GetpostModel;
use App\CategoryModel;

class HomeController extends Controller
{
    function index()
    {
        $max_product = 5;
        $newest_products = Product::getNewests($max_product);
        $biggest_discount_products = Product::getBiggestDiscounted($max_product);
        $all_product = GetpostModel::AllProduct($max_product);
        $category = CategoryModel::GetVal(7);

        return view('/home/index', [
            'title' => 'Home',
            'newest_products' => $newest_products,
            'biggest_discount_products' => $biggest_discount_products,
            'all_product' => $all_product,
            'category' => $category,
        ]);
    }
}
