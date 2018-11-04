<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Cart extends Model
{
    public static function GetProductIDs($id)
    {
        $cartFoods = Session::get('cart');

        $cartFoods = array_values($cartFoods);
        for ($i = 0; $i < count($cartFoods); $i++)
        {
            $item = explode(':',$cartFoods[$i]);
            if($item[0] == $id)
            {
                return $id;
            }
        }
        return 0;
    }

    public static function GetProductID($productcart)
    {
        $productcarts = array_values($productcart);
        $result = [];

        for($i=0; $i< count($productcarts); $i++) {


            array_push($result, explode(':', $productcarts[$i])[0]);

        }
        return $result;


    }

    public static function GetProductQty($id)
    {
        $cartitems = Session::get('cart');

        $cartitems = array_values($cartitems);
        for ($i = 0; $i < count($cartitems); $i++)
        {
            $item = explode(':',$cartitems[$i]);
            if($item[0] == $id)
            {
                return $item[1];
            }
        }
        return 0;
    }
}
