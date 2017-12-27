<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    function cart()
    {
        // TODO: get current logged in costumer email
        $costumer_email = "fake_costumer@gmail.com";

        $cart_items = Costumer::getCartItemsWithJoinProduct()->
        ->get([
            'cart.id AS cart_id',
            'cart.quantity AS cart_quantity',
            'prod.name AS product_name',
            'prod.discount_in_percent/100 AS product_discount'
            DB::raw('prod.price - (prod.price * product_discount) AS product_price_discount'),
        ]);

        return view('/cart/index', [
            'title' => 'cart',
            'cart_items' => $cart_items
        ]);
    }
}
