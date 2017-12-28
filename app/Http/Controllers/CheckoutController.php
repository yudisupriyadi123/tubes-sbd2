<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Costumer;
use App\Transaction;
use App\TransactionDetail;

class CheckoutController extends Controller
{
    /**
     * TODO: atur route nya
     * Tahap dimana data transaksi masih belum dibuat, masih tetap hanya di keranjang.
     * Tahap dimana costumer (1) mengisi alamat dan (2) memilih kurir.
     * Tahap lanjutan dari halaman keranjang setelah menekan tombol Bayar.
     *
     * @param  Request  $req    berisi cart_id dari produk yang dipilih ketika di laman
     *                          keranjang
     * @return Response
     */
    function checkoutStep1(Request $req)
    {
        $r = $req->all();

        $cart_items = Cart::getWithJoinProductByIds($r['cart_ids'])
            ->get([
                'cart.id AS cart_id',
                'cart.quantity AS cart_quantity',
                'prod.name AS product_name',
                'prod.discount_in_percent/100 AS product_discount'
                DB::raw('prod.price - (prod.price * product_discount) AS product_price_discount'),
            ]);

        // TODO: buat view nya
        return view('/checkout/step-1', [
            'title' => 'Checkout Step 1',
            'cart_items' => $cart_items,
        ]);
    }
    /**
     * TODO: atur route nya
     * Tahap dimana data transaksi dibuat.
     * Tahap alamat baru disimpan.
     * Tahap dimana setelahnya tinggal menunggu konfirmasi pembayaran dari costumer.
     *
     * Daftar Singkatan;
     *      - CSA = Costumer Shipping Address
     *
     * @param  Request  $req
     * @return Response
     */
    function checkoutStep2(Request $req)
    {
        $r = $req->all();

        // TODO: get current logged in costumer email
        $costumer_email = "fake_costumer@gmail.com";

        $trans = new Transaction;
        $trans->courier = $r['courier'];
        $trans->costumer_email = $costumer_email;
        $trans->costumer_shipping_address_id = $r['csa_id'];
        $trans->save();

        // move item from cart to transaction-detail table in DB
        TransactionDetail::pullItemFromCart($trans->id, $r['cart_ids']);

        return view('/checkout/step-2', [
            'title' => 'Checkout Step 2',
            'trans_id' => $trans->id,
        ]);
    }
}
