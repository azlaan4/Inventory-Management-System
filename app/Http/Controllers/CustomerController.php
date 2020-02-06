<?php

namespace App\Http\Controllers;

use App\Customer;
use Session;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $customers = Customer::latest('id')->paginate(25);
        return view('customers.index')->with('customers', $customers);
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'number' => 'required|min:11|max:14',
            'address' => 'required|min:4|max:255',
        ]);

        $customer = new Customer;
        $customer->name = $request->name;
        $customer->type = $request->type;
        $customer->number = $request->number;
        $customer->address = $request->address;
        $customer->save();

        Session::flash('message', 'Customer, ' . $customer->name . ' added to the database.');
        return redirect()->route('customers.index');
    }

    public function update(Request $request, Customer $customer)
    {
        $validator = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'number' => 'required|min:11|max:14',
            'address' => 'required|min:4|max:255',
        ]);

        $customer = Customer::find($customer->id);

        Session::flash('message', 'Customer, ' . $customer->name . ' information updated.');

        $customer->name = $request->name;
        $customer->type = $request->type;
        $customer->number = $request->number;
        $customer->address = $request->address;
        $customer->save();

        return redirect()->route('customers.index');
    }

}
