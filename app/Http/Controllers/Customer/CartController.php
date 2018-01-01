<?php

namespace App\Http\Controllers\Customer;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Customer;

class CartController extends Controller
{
    function index()
    {
        $customer_email = Auth::user()['email'];

        $cart_items = Customer::find($customer_email)->cart;

        return view('/cart/index', [
            'title' => 'cart',
            'cart_items' => $cart_items
        ]);
    }
}
