<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Wallet;

class Payment extends Model
{
    CONST SUCCESSWITHWARNING  = 'SUCCESSWITHWARNING';
    
    CONST SUCCESS = 'SUCCESS';

    CONST FAILURE = 'FAILURE';

    CONST PAID = 'PAID';

    CONST DEFAULT_PRICE = 200;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaction_id','user_id',
        'amount','payment_status','payment_info'
    ];

    protected static function boot()
    {
        parent::boot();
        static::created (function ($model) {
           Wallet::insert();
        });
    }

}
