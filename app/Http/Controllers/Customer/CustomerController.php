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

        $on_process_orders = $customer->transaction->whereIn('status', [
            'waiting_approval',
            'accepted',
            'waiting_payment',
            'product_has_sent',
        ]);
        $success_orders  = $customer->transaction->where('status', 'done');
        $rejected_orders = $customer->transaction->where('status', 'rejected');
        $canceled_orders = $customer->transaction->where('status', 'canceled');

		return view('customer/index', [
            'title'              => 'Customer',
            'customer'           => $customer,
            'on_process_orders'  => $on_process_orders,
            'success_orders'     => $success_orders,
            'rejected_orders'    => $rejected_orders,
            'canceled_orders'    => $canceled_orders,
        ]);
    }
    function customer($idcustomer)
    {
    	return view('customer/index', [
            'title' => "Customer {$idcustomer}",
        ]);
    }
}
