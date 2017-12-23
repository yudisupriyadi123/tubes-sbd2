<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class MainController extends Controller
{
    //
    function index()
    {
        $newest_products =
        Product::orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $biggest_discount_products =
        Product::orderBy('discount_in_percent', 'desc')
            ->take(5)
            ->get();

    	return view('/home/index', [
            'title' => 'Home',
            'newest_products' => $newest_products,
            'biggest_discount_products' => $biggest_discount_products,
        ]);
    }
    function shops()
    {
    	return view('/shops/index',['title' => 'All Products']);
    }
    function recent()
    {
        return view('/shops/index',['title' => 'Recently Posts']);
    }
    function top()
    {
    	return view('/shops/index',['title' => 'Popular Posts']);
    }
    function popular()
    {
    	return view('/shops/index',['title' => 'Most Viewed']);
    }
    function search()
    {
        $ctr = $_GET['q'];
        return view('/search/index',['title' => $ctr]);
    }
    function product($id)
    {
        return view('/product/index',['title' => 'Product '.$id]);
    }
    function category($ctr)
    {
        return view('/category/index',['title' => 'Category '.$ctr]);
    }
    function orderCek()
    {
        return view('/main/cek',['title' => 'Order Cek']);
    }
    function orderProof()
    {
        return view('/main/proof',['title' => 'Order Proof']);
    }
    function signin()
    {
        return view('/sign/in',['title' => 'Signin']);
    }
    function signup()
    {
        return view('/sign/up',['title' => 'Signup']);
    }
    function cart()
    {
        return view('cart/index', ['title' => 'Your Cart']);
    }
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
    function checkoutStep1($req)
    {
        $cart_items = Cart::whereIn('id', $req->cart_ids)
                            ->join('product', 'product.id', '=', 'cart.product_id');

        // TODO: buat view nya
        return view('/checkout/step1', [
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
     * @param  Request  $req
     * @return Response
     */
    function checkoutStep2($req)
    {
        // TODO: get current logged in costumer email
        $costumer_email = "fake_costumer@gmail.com";

        if (!empty($req->address['costumer_shipping_address_id'])) {
            // artinya costumer memilih alamat yang sudah ada
            $CSA_id = $req->address['costumer_shipping_address_id'];
        } else {
            // artinya costumer membuat alamat baru
            // TODO: buat model costumer_shipping_address
            $csa = new CSA;

            $csa->costumer_email = $costumer_email;
            $csa->address = $req->new_address['address'];
            $csa->kecamatan = $req->new_address['kecamatan']
            $csa->kotamadya = $req->new_address['kotamadya']
            $csa->provinsi = $req->new_address['provinsi']
            $csa->postal_code = $req->new_address['postal_code']
            $csa->receiver_name = $req->new_address['receiver_name']
            $csa->receiver_phone_number = $req->new_address['receiver_phone_number']

            $csa->save();

            $CSA_id = $csa->id; // last id
        }

        // TODO: membuat model Transaction
        $trans = new Transaction;

        $trans->courier = $req->courier;
        $trans->costumer_email = $costumer_email;
        $trans->costumer_shipping_address_id = $CSA_id;

        $trans->save();

        // TODO: buat metode ini di Transaction model
        Transaction::moveFromCart($trans->id, $req->cart_ids);

        return view('/checkout/step2', [
            'title' => 'Checkout Step 2',
        ]);
    }
}
