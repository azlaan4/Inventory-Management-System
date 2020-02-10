<?php

namespace App\Http\Controllers;

use App\Purchase;
use App\Supplier;
use App\Product;

use Illuminate\Http\Request;

use Session;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::latest('id')->paginate(15);
        $suppliers = Supplier::all();
        $products = Product::all();

        return view('purchases.index')
                            ->with('purchases', $purchases)
                            ->with('suppliers', $suppliers)
                            ->with('products', $products);
    }

    public function store(Request $request)
    {
        $data = $request->purchase_details;

        dd($data);
    }

    public function update(Request $request, Purchase $purchase)
    {
        //
    }
}
