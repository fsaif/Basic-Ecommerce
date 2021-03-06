<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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
        if ($request->is(App::getLocale() . '/shop/category/*')) // check the patten in url and decide
        {
            $categories = Category::getCategory()->where('id', $request->segment(4))->first();
            $name = $categories->name;
            $items = Item::where('category_id', $categories->id)->paginate(12);
        } else {
            $items = Item::where('status', '=', 0)->paginate(12);
            if (App::getLocale() == 'en') {
                $name = 'Home Page';
            } else if (App::getLocale() == 'ar') {
                $name = 'الصفحة الرئيسية';
            }
        }

        return view('home')->with('items', $items)->with('name', $name);
    }

    public function showProduct($id)
    {
        $item = Item::find($id);
        if($item == null){
            abort(404);
        }
        $category = Category::getCategory()->where('id', $item->category_id)->first();
        $comments = Comment::all()->where('item_id', $id);
        return view('product')->with('item', $item)->with('comments', $comments)->with('category', ( isset($category->name) ? $category->name : 'not found' ) );
    }


}
