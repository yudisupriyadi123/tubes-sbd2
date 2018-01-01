<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Costumer;

class CartController extends Controller
{
    function index()
    {
        // TODO: get current logged in costumer email
        $costumer_email = "fake_costumer@gmail.com";

        $cart_items = Costumer::getCartItemsWithJoinProduct($costumer_email)
        ->get([
            'cart.id AS cart_id',
            'cart.quantity AS cart_quantity',
            'prod.name AS product_name',
            DB::raw('prod.price - (prod.price * (prod.discount_in_percent/100)) AS product_price_discount'),
        ]);

        return view('/cart/index', [
            'title' => 'cart',
            'cart_items' => $cart_items
        ]);
    }
}
