<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Item;
use App\User;
use App\Http\Controllers\Controller;

class ActivationController extends Controller
{


    public function activation($type, $id)
    {
        switch ($type){

            case 'user':
                $user = User::find($id);
                if ($user->status == 0) {
                    $user->status = 1;  // deactivate
                } elseif ($user->status == 1) {
                    $user->status = 0;  // activate
                }
                $user->save();
                break;

            case 'category':
                $cat = Category::find($id);
                if ($cat->status == 0) {
                    $cat->status = 1;  // deactivate
                } elseif ($cat->status == 1) {
                    $cat->status = 0;  // activate
                }
                $cat->save();
                break;

            case 'product':
                $item = Item::find($id);
                if ($item->status == 0) {
                    $item->status = 1;  // deactivate
                } elseif ($item->status == 1) {
                    $item->status = 0;  // activate
                }
                $item->save();
                break;

            default:
                break;
        }

        return back();

    }


}
