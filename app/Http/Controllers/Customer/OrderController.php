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
    function check()
    {
        return view('/main/cek',['title' => 'Order Cek']);
    }

    /**
     * Check given transaction id from clicked link.
     *
     */
    function runCheck($id)
    {
        $trans = Transaction::find($id);

        if (!$trans) {
            return view('/main/cek',[
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
     * Check given transaction id from check-order page.
     *
     */
    function postRunCheck(Request $req)
    {
        $r = $req->all();

        // $r['trans_id'] is md5-ed transactionId
        $trans = Transaction::getByIdMD5($r['trans_id'])->first();

        if (!$trans) {
            return view('/main/cek',[
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

    function uploadProof(Request $req)
    {
        $r = $req->all();

        $file = $r['file'];
        $destinationPath    = 'img/proof_photo_customer';
        $extension          = $file->getClientOriginalExtension();
        // TODO: it should check if randomed file name is not exist in directory
        // rename file with random number + ext
        $fileName           = rand(11111, 99999) . '.' . $extension;
        $upload_success     = $file->move(public_path($destinationPath), $fileName);


        $trans = Transaction::getByIdMD5($r['order_id'])->first();
        $trans->proof_photo = "{$destinationPath}/{$fileName}";
        $trans->save();

        if ($upload_success) {
            return back()
                    ->with('status', 'OK')
                    ->with('message', 'OK! Please patience, admin will review that');
        }

        return back()
                ->with('status', 'BAD')
                ->with('message', 'Move uploaded file is fail');
    }

    function receivedConfirmed($id)
    {
        $trans = Transaction::find($id);
        $trans->status = 'done';
        $trans->save();

        return back();
    }
}
