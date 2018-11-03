<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CurrencyController extends Controller
{
    public function changeCurrency($currenyID)
    {
        Session::put('currency', $currenyID);
        return Redirect::back();
    }
}
