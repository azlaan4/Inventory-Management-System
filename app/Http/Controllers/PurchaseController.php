<?php

namespace App\Http\Controllers;

use App\Purchase;
use App\PurchaseDetails;
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
        // setting purchase transection data to the DB
        $purchase                = new Purchase;

        $purchase->supplier_id   = $request->supplier_id;
        $purchase->discount      = $request->discount;
        $purchase->product_count = $request->total_products;
        $purchase->grand_total   = $request->grand_total;

        $purchase->save();

        // setting purchased products data to the DB
        $data = $request->purchase_details;
        $data = json_decode($data[0], true);

        foreach ($data as $d => $value) {
            $purchase_detail               = new PurchaseDetails;

            $purchase_detail->purchase_id  = $purchase->id; // getting value from the above set data
            $purchase_detail->product_id   = $value["id"];
            $purchase_detail->items        = $value["qty"];
            $purchase_detail->price        = $value["price"];
            $purchase_detail->total_price  = $value["total_price"];
            $purchase_detail->save();

            // setting value to the stock of this product
            $product = Product::find($value["id"]);
            $product->stock = $value["qty"];
            $product->save();
        }

        Session::flash('message', 'Purchased Transection Added to the Database.');
        return redirect()->route('purchases.index');
    }

    public function update(Request $request, Purchase $purchase)
    {
        //
    }
}
