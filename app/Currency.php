<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Currency extends Model
{
    protected $fillable = [
        'name', 'shortcut', 'exchangeRate',
    ];

    protected $primaryKey = 'currencyID';

    public static function convert($val)
    {
        $exchangeRate = self::getCurrency();
        return $exchangeRate * $val;
    }

    public static function deConvert($val)
    {
        $exchangeRate = self::getCurrency();
        return $exchangeRate / $val;
    }
    public static function getCurrency()
    {
        $currencyID = Session::get('currency');
        $currency = Currency::find($currencyID);
        return $currency->exchangeRate;
    }

}
