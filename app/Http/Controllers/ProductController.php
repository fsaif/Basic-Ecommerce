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
        $items = Item::where('created_by', $id)->paginate(12);
        return view('myProducts')->with('items', $items);
    }

    public function showCreateForm()
    {
        $categories = Category::getCategory()->get();
        return view('addProduct')->with('categories', $categories);
    }

    public function createItem(Request $request)
    {
        $userID = Auth::id();
        Item::validator($request->all())->validate();

        Item::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'price' => $request['price'],
            'country' => $request['country'],
            'img' => (isset($request['img']) ? $request['img'] : 'item.jpg'),
            'created_by' => $userID,
            'category_id' => $request['category'],
            'owned_by' => $userID,
        ]);

        if ($request->hasfile('img')) {
            $file = $request->file('img');
            $name = $file->getClientOriginalName();
            $filename = time() . $name;
            $file->move('storage/items/', $filename);
        }

        return redirect()->route('myitems.route')->with('alert_success', 'Item was added successfully');

    }

    public function showEditForm($id)
    {
        $categories = Category::getCategory()->get();
        $item = Item::find($id);
        if($item == null){
            abort(404);
        }
        return view('editProduct')->with('item', $item)->with('categories', $categories);
    }

    public function editItem(Request $request, $id)
    {
        $item = Item::find($id);
        Item::validator($request->all())->validate(); // Validation
        $item->name = $request->input('name');
        $item->description = $request->input('description');
        $item->price = $request->input('price');
        $item->country = $request->input('country');
        $item->category_id = $request->input('category');
        $item->updated_by = Auth::id();

        if ($request->hasfile('img')) {
            $file = $request->file('img');
            $name = $file->getClientOriginalName();
            $filename = time() . $name;
            $file->move('storage/items/', $filename);
            $item->img = $filename;
        }

        $item->save();

        return redirect()->route('myitems.route')->with('alert_success', 'Item was updated successfully');
    }

    public function deleteItem($id)
    {
        Item::destroy($id);

        return redirect()->route('myitems.route')->with('alert_danger', 'Item was deleted successfully');
    }

    public function addComment(Request $request, $id)
    {
        $userID = Auth::id();

        Comment::create([
            'comment' => $request['comment'],
            'created_by' => $userID,
            'item_id' => $id,
        ]);


        return back();
    }

}
