<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\TransactionDetail;
use App\Costumer;
use App\Cart;
use Illuminate\Support\Facades\DB;

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
        // TODO: jangan lupa ganti khusu untuk admin
        $newest_products =
        Product::orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        return view('/product/index',[
            'title' => 'Product '.$id,
            'newest_products' => $newest_products
        ]);
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
    function cart()
    {
        // TODO: get current logged in costumer email
        $costumer_email = "fake_costumer@gmail.com";

        $cart_items = Costumer::find($costumer_email)
            ->cart()
            ->join('product AS prod', 'prod.id', '=', 'cart.product_id')
            ->get([
                'cart.id AS cart_id',
                'cart.quantity AS cart_quantity',
                'prod.name AS product_name',
                DB::raw('prod.price - (prod.price * (prod.discount_in_percent/100)) AS product_price_discount'),
            ]);

        return view('/cart/index', [
            'title' => 'cart',
            'cart_items' => $cart_items
        ]);
    }
    function purchase($idcart)
    {
        return view('/purchase/index',['title' => 'Purchase '.$idcart]);
    }
    function puchaseAll()
    {
        return view('/purchase/index',['title' => 'Purchase All']);
    }
    function signin()
    {
        return view('/sign/in',['title' => 'Signin']);
    }
    function signup()
    {
        return view('/sign/up',['title' => 'Signup']);
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
    function checkoutStep1(Request $req)
    {
        $r = $req->all();
        $cart_items = Cart::whereIn('id', $req->cart_ids)
                        ->join('product', 'product.id', '=', 'cart.product_id');

        // TODO: get current logged in costumer email
        $costumer_email = "fake_costumer@gmail.com";

        $cart_items = Costumer::find($costumer_email)
            ->cart()
            ->whereIn('cart.id', $req->cart_ids)
            ->join('product AS prod', 'prod.id', '=', 'cart.product_id')
            ->get([
                'cart.id AS cart_id',
                'cart.quantity AS cart_quantity',
                'prod.name AS product_name',
                DB::raw('prod.price - (prod.price * (prod.discount_in_percent/100)) AS product_price_discount'),
            ]);

        // TODO: buat view nya
        return view('/purchase/index', [
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
            $csa->kecamatan = $req->new_address['kecamatan'];
            $csa->kotamadya = $req->new_address['kotamadya'];
            $csa->provinsi = $req->new_address['provinsi'];
            $csa->postal_code = $req->new_address['postal_code'];
            $csa->receiver_name = $req->new_address['receiver_name'];
            $csa->receiver_phone_number = $req->new_address['receiver_phone_number'];
            $csa->save();

            $CSA_id = $csa->id; // last id
        }

        $trans = new Transaction;
        $trans->courier = $req->courier;
        $trans->costumer_email = $costumer_email;
        $trans->costumer_shipping_address_id = $CSA_id;
        $trans->save();

        // move item from cart to transaction-detail table in DB
        TransactionDetail::pullItemFromCart($trans->id, $req->cart_ids);

        return view('/checkout/step2', [
            'title' => 'Checkout Step 2',
        ]);
    }
}

