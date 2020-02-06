<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

use Session;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $brands = Brand::latest('id')->paginate(15);
		return view('brands.index')->with('brands', $brands);
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|min:3|max:30',
        ]);

        $brand = new Brand;
        $brand->name = $request->name;
        $brand->save();

        Session::flash('message', 'Brand, ' . $brand->name . ' added to the database.');
        return redirect()->route('brands.index');
    }

    public function update(Request $request, Brand $brand)
    {
        $validator = $request->validate([
            'name' => 'required|min:3|max:30',
        ]);

        $brand = Brand::find($brand->id);

        Session::flash('message', 'Information of brand, ' . $brand->name . ' is updated.');

        $brand->name = $request->name;
        $brand->save();

        return redirect()->route('brands.index');
    }

}
