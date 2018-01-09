<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Transaction;
use App\TransactionDetail;
use App\Customer;
use App\Cart;
use App\ProductCategory;

class MainController extends Controller
{
    function shops()
    {
        $max_product = 100;
        $prd = Product::getAll($max_product);
        return view('/shops/index',['title' => 'All Products', 'prd' => $prd]);
    }
    function recent()
    {
        $max_product = 100;
        $prd = Product::getNewests($max_product);
        return view('/shops/index',['title' => 'Recently Posts', 'prd' => $prd]);
    }
    function discount()
    {
        $max_product = 100;
        $prd = Product::getBiggestDiscounted($max_product);
        return view('/shops/index',['title' => 'Biggest Discount', 'prd' => $prd]);
    }
    function popular()
    {
        // TODO: belum dibuat logika mendapatkan produk populer
        $max_product = 100;
        $prd = Product::getBiggestDiscounted($max_product);

        return view('/shops/index',[
            'title' => 'Most Viewed',
            'prd' => $prd,
        ]);
    }
    function search()
    {
        $keyword = $_GET['q'];
        $prd = Product::search($keyword);

        return view('/search/index',[
            'title' => "Search on ${keyword}",
            'prd' => $prd,
        ]);
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
    function category()
    {
        $id_ctr = $_GET['idctr'];
        $ctr    = ProductCategory::find($id_ctr);

        if ($ctr) {
            $prd = Product::getByCategory($id_ctr);
        } else {
            $prd = null;
        }

        return view('/category/index', [
            'title' => 'Category',
            'prd' => $prd,
            'ctr' => $ctr,
        ]);
    }
}

