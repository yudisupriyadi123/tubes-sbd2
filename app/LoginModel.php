<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LoginModel extends Model
{
    //

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'costumer';

    public function scopeLoginUser($query, $email, $pass)
    {
    	return DB::table('costumer')
    	->where('email',$email)
    	->where('password',$pass)
    	->value('email');
    }

    public function scopeLoginAdmin($query, $email, $pass)
    {
    	return DB::table('users')
    	->where('email',$email)
    	->where('password',$pass)
    	->value('email');
    }

    public function scopeCreateAccount($query, $data)
    {
        # code...
        return DB::table('costumer')
        ->insert($data);
    }
}
