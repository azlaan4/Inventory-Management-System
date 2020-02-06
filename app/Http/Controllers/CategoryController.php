<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use Session;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::latest('id')->paginate(15);
		return view('categories.index')->with('categories', $categories);
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|min:3|max:30',
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->save();

        Session::flash('message', 'category, ' . $category->name . ' added to the database.');
        return redirect()->route('categories.index');
    }

    public function update(Request $request, Category $category)
    {
        $validator = $request->validate([
            'name' => 'required|min:3|max:30',
        ]);

        $category = Category::find($category->id);

        Session::flash('message', 'Information of category, ' . $category->name . ' is updated.');

        $category->name = $request->name;
        $category->save();

        return redirect()->route('categories.index');
    }

}
