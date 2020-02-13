<?php

namespace App\Http\Controllers;

use App\Sale;
use App\SaleDetails;
use App\customer;
use App\Product;

use Illuminate\Http\Request;

use Session;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sales      = Sale::latest('id')->paginate(15);
        $customers  = Customer::all();
        $products   = Product::all();

        return view('sales.index')
                            ->with('sales', $sales)
                            ->with('customers', $customers)
                            ->with('products', $products);
    }

    public function store(Request $request)
    {
        // setting sale transection data to the DB
        $sale                = new sale;

        $sale->customer_id   = $request->customer_id;
        $sale->discount      = $request->discount;
        $sale->product_count = $request->total_products;
        $sale->grand_total   = $request->grand_total;

        $sale->save();

        // setting saled products data to the DB
        $data = $request->sale_details;
        $data = json_decode($data[0], true);

        foreach ($data as $d => $value) {
            $sale_detail               = new saleDetails;

            $sale_detail->sale_id  = $sale->id; // getting value from the above set data
            $sale_detail->product_id   = $value["id"];
            $sale_detail->items        = $value["qty"];
            $sale_detail->price        = $value["price"];
            $sale_detail->total_price  = $value["total_price"];
            $sale_detail->save();

            // setting value to the stock of this product
            $product = Product::find($value["id"]);
            $product->stock = $product->stock - $value["qty"];
            $product->status = ($product->stock > 0) ? "Available" : "Not-Available"; // setting product status
            $product->save();
        }

        Session::flash('message', 'Sale Transection Added to the Database.');
        return redirect()->route('sales.index');
    }

}
