<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transaction;

class OrderController extends Controller
{
    /**
     * Web page used by costumer to check their order status.
     *
     */
    function check(Request $req)
    {
        if (!$req->isMethod('post')) {
            return view('/main/cek',['title' => 'Order Cek']);
        }

        $r = $req->all();

        // @var $r['trans_id'] is md5-ed transactionId
        $trans = Transaction::getByIdMD5($r['trans_id'])->first();

        if (!$trans) {
            return view('/order/cek',[
                'title' => 'Order Cek',
                'order_id_not_found' => true
            ]);
        }

        return view('/order/order-status', [
            'title' => 'Order Status',
            'status' => $trans->status,
        ]);
    }

    /**
     * Web page used by costumer to send photo of her evidence of transfer.
     *
     */
    function proof()
    {
        return view('/order/proof',['title' => 'Order Proof']);
    }
}
