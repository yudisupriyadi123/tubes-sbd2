<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
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

        try {
            $cart = new Cart;

            $cart->size = $req->size;
            $cart->color = $req->color;
            $cart->quantity = $req->quantity;
            $cart->costumer_email = $costumer_email;
            $cart->product_id = $req->product_id;

            $cart->save();

            return response()->json(['status' => 'OK']);
        } catch (QueryException $e) {
            return response()->json([
                'status' => 'ERR',
                'message' => $e->getMessage(),
            ]);
        }

    }

    /**
     * Save change on quantity of chart item to DB
     *
     * @param  Request  $req
     * @return Response
     */
    function onChangeQuantityOfCartItem(Request $req)
    {
        $r = $req->all();
        try {
            $cart_item = Cart::find($r['cart_id']);
            $cart_item->quantity = $r['qty'];
            $cart_item->save();

            return response()->json(['status' => 'OK']);
        } catch (QueryException $e) {
            return response()->json([
                'status' => 'BAD',
                'message' => $e->getMessage()
            ]);
        }
    }
}
