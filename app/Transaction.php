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

    static function getByIdMD5($md5ed_trans_id)
    {
        return Self::whereRaw("MD5(`id`) = '${md5ed_trans_id}'");
    }

    public function transactionDetail()
    {
        return $this->hasMany('\App\TransactionDetail', 'transaction_id', 'id');
    }
}
