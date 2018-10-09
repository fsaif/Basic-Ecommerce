<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    // authentication code
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showMyItems()
    {
        $id = Auth::id();
        $items = Item::where('user_id', $id)->paginate(4);
        return view('myProducts')->with('items', $items);
    }

    public function showCreateForm()
    {
        $categories = Category::all();
        return view('addProduct')->with('categories', $categories);
    }

    public function createItem(Request $request)
    {
        $id = Auth::id();

        $newItem = new Item();
        $newItem->name = $request->input('name');
        $newItem->description = $request->input('description');
        $newItem->price = $request->input('price');
        $newItem->country = $request->input('country');
        $newItem->category_id = $request->input('category');
        $newItem->user_id = $id;

        if($request->hasfile('upload'))
        {
            $file = $request->file('upload');
            $name = $file->getClientOriginalName();
            $filename =time().$name;
            $file->move('storage/items/', $filename);
            $newItem->img = $filename;
        }

        $newItem->save();

        return redirect(route('myitems.route'));

    }

    public function showEditForm($id)
    {
        $categories = Category::all();
        $item = Item::find($id);
        return view('editProduct')->with('item', $item)->with('categories', $categories);
    }

    public function editItem(Request $request, $id)
    {
        $item = Item::find($id);
        $item->name = $request->input('name');
        $item->description = $request->input('description');
        $item->price = $request->input('price');
        $item->country = $request->input('country');
        $item->category_id = $request->input('category');

        if($request->hasfile('upload'))
        {
            $file = $request->file('upload');
            $name = $file->getClientOriginalName();
            $filename =time().$name;
            $file->move('storage/items/', $filename);
            $item->img = $filename;
        }

        $item->save();

        return redirect(route('myitems.route'));
    }

    public function deleteItem($id)
    {
        $item = Item::find($id);
        $item->delete();

        return redirect(route('myitems.route'));
    }

    public function addComment(Request $request, $id)
    {
        $userID = Auth::id();
        $comment = new Comment();
        $comment->comment = $request->input('comment') ;
        $comment->user_id = $userID;
        $comment->item_id = $id;

        $comment->save();

        return back();
    }

}
