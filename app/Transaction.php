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
}
