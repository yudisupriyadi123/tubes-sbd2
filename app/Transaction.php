<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transaction';

    public $timestamps = false;

    /**
     * the $timestamps laravel still not OK.
     *
     */
    public function setCreatedAtAttribute($value) {
        $this->attributes['created_at'] = \Carbon\Carbon::now();
    }

    static function getNeedApproved($max_record)
    {
        return Self::where('status', '=', 'waiting_approval')
                ->take($max_record)
                ->get();
    }

    static function getWaitingPayment($max_record)
    {
        return Self::where('status', '=', 'waiting_payment')
                ->take($max_record)
                ->get();
    }

    static function getPaymentVerified($max_record)
    {
        return Self::where('status', '=', 'payment_verified')
                ->take($max_record)
                ->get();
    }

    static function getHasSent($max_record)
    {
        return Self::where('status', '=', 'product_has_sent')
                ->take($max_record)
                ->get();
    }

    static function getRecentSuccess($max_record)
    {
        return Self::where('status', '=', 'done')
                ->orderBy('created_at', 'desc')
                ->take($max_record)
                ->get();
    }

    static function getByIdMD5($md5ed_trans_id)
    {
        return Self::whereRaw("MD5(`id`) = '${md5ed_trans_id}'");
    }

    public function getTotalPrice()
    {
        $total_price = 0;

        // iterate over all TransactionDetail
        foreach ($this->transactionDetail as $item) {
            $total_price += $item->getTotalPrice();
        }

        return $total_price;
    }

    public function transactionDetail()
    {
        return $this->hasMany('\App\TransactionDetail', 'transaction_id', 'id');
    }

    public function customer()
    {
        // TODO: fix typo on database structure
        return $this->hasOne('\App\Customer', 'email', 'costumer_email');
    }

    public function csa()
    {
        // TODO: fix typo on database structure
        return $this->hasOne('\App\CSA', 'id', 'costumer_shipping_address_id');
    }

    /* --------------------------------------------------------
     | For report
     | --------------------------------------------------------*/

    static function getNeedApprovedCount()
    {
        return Self::where('status', '=', 'waiting_approval')->count();
    }

    static function getWaitingPaymentCount()
    {
        return Self::where('status', '=', 'waiting_payment')->count();
    }

    static function getPaymentVerifiedCount()
    {
        return Self::where('status', '=', 'payment_verified')->count();
    }

    static function getHasSentCount()
    {
        return Self::where('status', '=', 'product_has_sent')->count();
    }

    static function getSuccessCount()
    {
        return Self::where('status', '=', 'done')->count();
    }

    static function getLastMonthProfit()
    {
        $current_month = date('m');

        $trans = Self::whereRaw("MONTH(`created_at`) = ${current_month}")->get();

        $profit = 0;

        // iterate over all Transaction
        foreach ($trans as $tran) {
            $profit += $tran->getTotalPrice();
        }

        return $profit;
    }

    static function getLastMonthProductSold()
    {
        $current_month = date('m');
        $trans = Self::whereRaw("MONTH(`created_at`) = ${current_month}")->get();

        $sold = 0;

        // iterate over all Transaction
        foreach ($trans as $tran) {
            $sold += $tran->transactionDetail->count();
        }

        return $sold;
    }
}
