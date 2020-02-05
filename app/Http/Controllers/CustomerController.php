<?php

namespace App\Http\Controllers;

use App\Customer;
use Session;

use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index()
    {
        return view('customers.index');
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'number' => 'required|min:11|max:14',
            'address' => 'required|min:4|max:255',
        ]);

        $customers = new Customer;
        $customers->name = $request->name;
        $customers->type = $request->type;
        $customers->number = $request->number;
        $customers->address = $request->address;
        $customers->save();

        Session::flash('message', 'Customer, ' . $customers->name . ' added to the database.');
        return redirect()->route('customers.index');
    }

    public function show(Customer $customer)
    {
        //
    }

    public function edit(Customer $customer)
    {
        //
    }

    public function update(Request $request, Customer $customer)
    {
        //
    }

    public function destroy(Customer $customer)
    {
        //
    }
}
