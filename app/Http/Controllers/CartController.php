<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{


    public function getCart()
    {
        if(Session::get('cart') != null) {

            $cartitems = Session::get('cart');
            $cartitems = array_values($cartitems);
            $items = Item::whereIn('id', $cartitems)->get();
            $itemsCount = count($items);

            for($i = 0; $i < count($items); $i++) {
                $items[$i]['quantity'] = Cart::GetProductQty($items[$i]->id);
            }

            $total = 0;

            foreach($items as $item) {
                $total += $item->price * Cart::GetProductQty($item->id);
            }

        } else {
            $items = 0;
            $total = 0;
            $itemsCount = 0;
        }
        return view('cart')->with('items', $items)->with('total', $total)->with('itemsCount', $itemsCount);
    }

    public function addToCart(Request $request, $id)
    {
        $product = Item::find($id)->id;
        $quantity = $request->input(['quantity']);

        if (Session::get('cart') != null) {

            $arraysearch = in_array(Cart::GetProductIDs($product), Cart::GetProductID(Session::get('cart')));

            if ($arraysearch == true) {

                $oldquantity = Cart::GetProductQty($product);

                $this->RemoveFromCart($product . ':' . $oldquantity);

                Session::push('cart', $product . ":" . ($oldquantity + $quantity));

            } else {
                Session::push('cart', $product . ":" . $quantity);
            }

        } else {
            Session::push('cart', $product . ":" . $quantity);
        }

        return Redirect::route('mycart.route');
    }

    public function RemoveFromCart($id)
    {
        $ProductsCart = Session::get('cart');
        if (($key = array_search($id, $ProductsCart)) !== false) {
            unset($ProductsCart[$key]);
            session()->pull('cart.' . $key);
        }

        return back();
    }
}
