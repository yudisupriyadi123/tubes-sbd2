<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class OrderController extends Controller
{
    function check(Request $req)
    {
        if (!$req->isMethod('post')) {
            return view('/main/cek',['title' => 'Order Cek']);
        }

        $r = $req->all();

        // @var $r['trans_id'] is md5-ed transactionId
        $trans = Transaction::getByIdMD5($r['trans_id'])->first();

        if (!$trans) {
            return view('/main/cek',[
                'title' => 'Order Cek',
                'order_id_not_found' => true
            ]);
        }

        return view('/main/order-status', [
            'title' => 'Order Status',
            'status' => $trans->status,
        ]);
    }

    function orderProof()
    {
        return view('/main/proof',['title' => 'Order Proof']);
    }
}
