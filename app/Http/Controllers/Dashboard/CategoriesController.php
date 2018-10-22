<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.categories.listCategories')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.addCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new Category();
        Category::validator($request->all())->validate();
        $cat->name_en = $request->input('name_en');
        $cat->name_ar = $request->input('name_ar');
        $cat->save();
        return redirect()->route('categories.index')->with('alert_sucesss','Category was added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = Category::find($id);
        if ($cat == null) {
            abort(404);
        }
        return view('dashboard.categories.editCategory')->with('cat', $cat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cat = Category::find($id);
        Category::validator($request->all())->validate();
        $cat->name_en = $request->input('name_en');
        $cat->name_ar = $request->input('name_ar');
        $cat->save();
        return redirect()->route('categories.index')->with('alert_sucesss','Category was updated successfully');
    }

    /**
     * Show the confirmation resource for delete.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $cat = Category::find($id);
        if ($cat == null) {
            abort(404);
        }
        return view('dashboard.categories.deleteCategory')->with('cat', $cat);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::find($id);
        $cat->delete();

        return redirect()->route('categories.index')->with('alert_danger','Category was deleted successfully');
    }
}
