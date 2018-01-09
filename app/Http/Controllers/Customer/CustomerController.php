<?php

namespace App\Http\Controllers\Customer;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    //
    function index()
    {
        $customer_email = Auth::user()['email'];

        $customer = Customer::find($customer_email);

        $on_process_orders = $customer->transaction()->orderBy('created_at', 'desc')
        ->whereIn('status', [
            'waiting_approval',
            'accepted',
            'waiting_payment',
            'payment_verified',
        ])->get();
        $success_orders  = $customer->transaction()->orderBy('created_at', 'desc')
                                                   ->where('status', 'done')
                                                   ->get();
        $payment_rejected_orders = $customer->transaction()->orderBy('created_at', 'desc')
                                                   ->where('status', 'payment_proof_rejected')
                                                   ->get();
        $has_sent_orders = $customer->transaction()->orderBy('created_at', 'desc')
                                                   ->where('status', 'product_has_sent')
                                                   ->get();

        return view('customer/index', [
            'title'                   => 'Customer',
            'customer'                => $customer,
            'on_process_orders'       => $on_process_orders,
            'success_orders'          => $success_orders,
            'payment_rejected_orders' => $payment_rejected_orders,
            'has_sent_orders'         => $has_sent_orders,
        ]);
    }
    function customer($idcustomer)
    {
        return view('customer/index', [
            'title' => "Customer {$idcustomer}",
        ]);
    }
}
