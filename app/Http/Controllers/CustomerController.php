<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $customers = Customer::orderBy('id','DESC')->paginate(5);
        return view('customer.index',compact('customers'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'customer_code' => 'required|string|max:5|unique:customers,customer_code',
            'customer_name' => 'required|string|max:150',
            'customer_owner' => 'required|string|max:150',
            'customer_liaison' => 'required|string|max:150',
            'customer_phone' => 'required|string|max:10',
            'customer_fax' => 'required|string|max:10',
            'customer_email' => 'required|string|email|max:150|unique:customers,customer_email',
            'customer_ZipCode' => 'required|string|max:150',
            'customer_address' => 'required|string|max:150',
            'customer_GUInumber' => 'required|string|max:150',
        ]);

        Customer::create($request->all());
        return redirect()->route('customer.index')
            ->with('success','Customer created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $customer = Customer::find($id);
        return view('customer.show',compact('customer'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $customer = Customer::find($id);
        return view('customer.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'customer_code' => 'required|string|max:5|unique:customers,id,'.$id.',customer_code',
            'customer_name' => 'required|string|max:150',
            'customer_owner' => 'required|string|max:150',
            'customer_liaison' => 'required|string|max:150',
            'customer_phone' => 'required|string|max:10',
            'customer_fax' => 'required|string|max:10',
            'customer_email' => 'required|string|email|max:150|unique:customers,id,'.$id.',customer_email',
            'customer_ZipCode' => 'required|string|max:150',
            'customer_address' => 'required|string|max:150',
            'customer_GUInumber' => 'required|string|max:150',

        ]);

        $input = $request->all();


        $customer = Customer::find($id);
        $customer->update($input);

        return redirect()->route('customer.index')
            ->with('success','Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
