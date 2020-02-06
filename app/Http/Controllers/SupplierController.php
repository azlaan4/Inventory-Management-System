<?php

namespace App\Http\Controllers;

use App\Supplier;
use Session;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $suppliers = Supplier::latest('id')->paginate(15);
        return view('suppliers.index')->with('suppliers', $suppliers);
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'number' => 'required|min:11|max:14',
            'address' => 'required|min:4|max:255',
        ]);

        $supplier = new Supplier;
        $supplier->name = $request->name;
        $supplier->type = $request->type;
        $supplier->number = $request->number;
        $supplier->address = $request->address;
        $supplier->save();

        Session::flash('message', 'Supplier, ' . $supplier->name . ' added to the database.');
        return redirect()->route('suppliers.index');
    }

    public function update(Request $request, Supplier $supplier)
    {
        $validator = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'number' => 'required|min:11|max:14',
            'address' => 'required|min:4|max:255',
        ]);

        $supplier = Supplier::find($supplier->id);

        Session::flash('message', 'Supplier, ' . $supplier->name . ' information updated.');

        $supplier->name = $request->name;
        $supplier->type = $request->type;
        $supplier->number = $request->number;
        $supplier->address = $request->address;
        $supplier->save();

        return redirect()->route('suppliers.index');
    }

    public function destroy(Supplier $supplier)
    {
        //
    }
}
