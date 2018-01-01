<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'admin';

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
        'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
}
