<?php

namespace App\Http\Controllers;

use App\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $manufacturers = Manufacturer::orderBy('id','DESC')->paginate(5);
        return view('manufacturer.index',compact('manufacturers'))
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
        return view('manufacturer.create');

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
            'manufacturer_code' => 'required|string|max:5|unique:manufacturers,manufacturer_code',
            'manufacturer_name' => 'required|string|max:150',
            'manufacturer_owner' => 'required|string|max:150',
            'manufacturer_liaison' => 'required|string|max:150',
            'manufacturer_phone' => 'required|string|max:10',
            'manufacturer_fax' => 'required|string|max:10',
            'manufacturer_email' => 'required|string|email|max:150|unique:manufacturers,manufacturer_email',
            'manufacturer_ZipCode' => 'required|string|max:150',
            'manufacturer_address' => 'required|string|max:150',
            'manufacturer_GUInumber' => 'required|string|max:150',
        ]);

        Manufacturer::create($request->all());
        return redirect()->route('manufacturer.index')
            ->with('success','Manufacturer created successfully');

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
        $manufacturer = Manufacturer::find($id);
        return view('manufacturer.show',compact('manufacturer'));
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
        $manufacturer = Manufacturer::find($id);
        return view('manufacturer.edit',compact('manufacturer'));
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
            'manufacturer_code' => 'required|string|max:5|unique:manufacturers,id,'.$id.',manufacturer_code',
            'manufacturer_name' => 'required|string|max:150',
            'manufacturer_owner' => 'required|string|max:150',
            'manufacturer_liaison' => 'required|string|max:150',
            'manufacturer_phone' => 'required|string|max:10',
            'manufacturer_fax' => 'required|string|max:10',
            'manufacturer_email' => 'required|string|email|max:150|unique:manufacturers,id,'.$id.',manufacturer_email',
            'manufacturer_ZipCode' => 'required|string|max:150',
            'manufacturer_address' => 'required|string|max:150',
            'manufacturer_GUInumber' => 'required|string|max:150',

        ]);

        $input = $request->all();


        $manufacturer = Manufacturer::find($id);
        $manufacturer->update($input);

        return redirect()->route('manufacturer.index')
            ->with('success','Manufacturer updated successfully');
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
