<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /* i dont want this controller to be authinticated
    public function __construct()
    {
        $this->middleware('auth');
    }
    */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->is('shop/category/*')) // check the patten in url and decide
        {
            $categories = Category::find($request->segment(3));
            $name = $categories->name;
            $items = Item::where('category_id',$categories->id)->paginate(4);
        } else {
            $items = Item::paginate(4);
            $name = 'Home Page';
        }

        return view('home' )->with('items', $items)->with('name',$name);
    }

    public function showProduct($id)
    {
        $item = Item::find($id);
        $comments = Comment::all()->where('item_id', $id);
        return view('product')->with('item', $item)->with('comments', $comments);
    }


}
