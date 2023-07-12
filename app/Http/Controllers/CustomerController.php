<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::get();

        return view('customer.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'address' => 'required',
        ]);
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->mobile = $request->mobile;
        $customer->address = $request->address;
        $customer->latitude = $request->latitude;
        $customer->longitude = $request->longitude;
        $customer->save();
        return redirect()->route('customer.index')->with('message', 'Add successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::findOrFail($id);

        return view('customer.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'address' => 'required',
        ]);
        $customer =Customer::findOrFail($id);
        $customer->name = $request->name;
        $customer->mobile = $request->mobile;
        $customer->address = $request->address;
        $customer->latitude = $request->latitude;
        $customer->longitude = $request->longitude;
        $customer->update();
        return redirect()->route('customer.index')->with('message', 'Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
