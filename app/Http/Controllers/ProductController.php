<?php

namespace App\Http\Controllers;

use App\Product;
use App\Supplier;
use App\Brand;
use App\Category;
use Illuminate\Http\Request;

use Session;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::latest('id')->paginate(15);
        $categories = Category::all();
        $brands = Brand::all();
        $suppliers = Supplier::all();

        return view('products.index')
                            ->with('suppliers', $suppliers)
                            ->with('brands', $brands)
                            ->with('categories', $categories)
                            ->with('products', $products);
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|min:3|max:30',
            'brand_id' => 'required|integer|min:1',
            'category_id' => 'required|integer|min:1',
            'size' => 'required',
            'unit' => 'required',
            'price' => 'required|integer|min:2',
            'mrp' => 'required|integer|min:2',
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->size = $request->size;
        $product->unit = $request->unit;
        $product->price = $request->price;
        $product->mrp = $request->mrp;
        $product->status = "Not-Available";
        $product->stock = 0;
        $product->save();

        Session::flash('message', 'Product, ' . $product->name . ' added to the database.');
        return redirect()->route('products.index');
    }

    public function update(Request $request, Product $product)
    {
        $validator = $request->validate([
            'name' => 'required|min:3|max:30',
            'brand_id' => 'required|integer|min:1',
            'category_id' => 'required|integer|min:1',
            'size' => 'required',
            'unit' => 'required',
            'price' => 'required|integer|min:2',
            'mrp' => 'required|integer|min:2',
        ]);

        Session::flash('message', 'Product, ' . $product->name . ' added to the database.');

        $product = Product::find($product->id);
        $product->name = $request->name;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->size = $request->size;
        $product->unit = $request->unit;
        $product->price = $request->price;
        $product->mrp = $request->mrp;
        $product->save();

        return redirect()->route('products.index');
    }

}
