<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Cart;
use App\CSA;

class AjaxController extends Controller
{
    /**
     * Put product to costumer cart
     *
     * @param  Request  $req
     * @return Response
     */
    function addToCart(Request $req)
    {
        $r = $req->all();

        // TODO: get current logged in costumer email
        $costumer_email = "fake_costumer@gmail.com";

        try {
            $cart = new Cart;

            $cart->size = $r['size'];
            $cart->color = $r['color'];
            $cart->quantity = $r['quantity'];
            $cart->costumer_email = $costumer_email;
            $cart->product_id = $r['product_id'];

            $cart->save();

            return response()->json([
                'status' => 'OK',
                'cart_id' => $cart->id,
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => 'ERR',
                'message' => $e->getMessage(),
            ]);
        }

    }

    function updateCart(Request $req)
    {
        $r = $req->all();

        try {
            $cart = Cart::find($r['cart_id']);

            $cart->size = $r['size'];
            $cart->color = $r['color'];
            $cart->quantity = $r['quantity'];

            $cart->save();

            return response()->json([
                'status' => 'OK',
                'cart_id' => $cart->id,
            ]);
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

            $prod = $cart_item->product()->get()->first();
            $price_discount =
            $prod->price-($prod->price*($prod->discount_in_percent/100));

            return response()->json([
                'status' => 'OK',
                'subtotal_price' => $price_discount * $cart_item->quantity,
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => 'BAD',
                'message' => $e->getMessage()
            ]);
        }
    }

    function addCSA(Request $req)
    {
        $r = $req->all();

        // TODO: get current logged in costumer email
        $costumer_email = "fake_costumer@gmail.com";

        try {
            $csa = new CSA();

            $csa->costumer_email = $costumer_email;
            $csa->address = $r['address'];
            $csa->kecamatan = $r['kecamatan'];
            $csa->kotamadya = $r['kotamadya'];
            $csa->provinsi = $r['provinsi'];
            $csa->postal_code = $r['postal_code'];
            $csa->receiver_name = $r['receiver_name'];
            $csa->receiver_phone_number = $r['receiver_phone_number'];

            $csa->save();

            $returnHTML = view('costumer_shipping_address/index', [
                'csa' => $csa,
            ])->render();

            return response()->json([
                'status' => 'OK',
                'html'=> $returnHTML,
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => 'BAD',
                'message' => $e->getMessage()
            ]);
        }
    }

    function getAllCSA(Request $req)
    {
        $r = $req->all();

        $csa_items = CSA::where('costumer_email', '=', $r['costumer_email'])->get();

        $returnHTML = view('ajax/list-of-costumer-shipping-address', [
                        'csa_items' => $csa_items,
                     ])->render();

        return  response()->json([
            'status' => 'OK',
            'html'=> $returnHTML,
        ]);
    }

    function getCSAbyId(Request $req) {
        $id = $req->all()['id'];

        try {
            $csa = CSA::find($id);

            return  response()->json([
                'status' => 'OK',
                'data'=> $csa,
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => 'BAD',
                'message' => $e->getMessage()
            ]);
        }
    }
}
