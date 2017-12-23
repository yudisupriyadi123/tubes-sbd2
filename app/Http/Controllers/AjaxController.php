<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;

class AjaxController extends Controller
{
    /**
     * Put product to costumer cart
     *
     * @param  Request  $req
     * @return Response
     */
    function addToCart($req)
    {
        // TODO: get current logged in costumer email
        $costumer_email = "fake_costumer@gmail.com";

        $cart = new Cart;

        $cart->size = $req->size;
        $cart->color = $req->color;
        $cart->quantity = $req->quantity;
        $cart->costumer_email = $costumer_email;
        $cart->product_id = $req->product_id;

        $cart->save();
    }
}
