<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customer';

    /**
     * By default, laravel assume 'id' as primary key column.
     *
     * @var string
     */
    protected $primaryKey = 'email';

    /**
     * Will stop laravel to assume the primary key is AUTO INCREMENT.
     * Important when use Auth::user()
     *
     * @var string
     */
    public $incrementing = false;

    /**
     * I do not need and not created column 'created_at' and 'updated_at'.
     * @var string
     */
    public $timestamps = false;

    /**
     * This setting will impact at login or logout process
     *
     * @var string
     */
    protected $remember_token = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'address', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function getFirstName()
    {
        return explode(' ', $this->name, 2)[0];
    }

    public function getLastName()
    {
        return explode(' ', $this->name, 2)[1];
    }

    public function cart()
    {
        // TODO: fix typo on database structure
        return $this->hasMany('App\Cart', 'costumer_email');
    }

    public function transaction()
    {
        return $this->hasMany('App\Transaction', 'costumer_email');
    }
}
