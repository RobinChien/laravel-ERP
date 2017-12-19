<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $companys = Company::orderBy('id','DESC')->paginate(5);
        return view('company.index',compact('companys'))
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
        $company = Company::find($id);
        return view('company.show',compact('company'));

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
        $company = Company::find($id);
        return view('company.edit',compact('company'));
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
            'company_code' => 'required|string|max:5|unique:companies,id,'.$id.',company_code',
            'company_name' => 'required|string|max:150',
            'company_owner' => 'required|string|max:150',
            'company_phone' => 'required|string|max:10',
            'company_fax' => 'required|string|max:10',
            'company_email' => 'required|string|email|max:150|unique:companies,id,'.$id.',company_email',
            'company_url' => 'required|url',
            'company_ZipCode' => 'required|string|max:150',
            'company_address' => 'required|string|max:150',
            'company_GUInumber' => 'required|string|max:150',

        ]);

        $input = $request->all();


        $company = Company::find($id);
        $company->update($input);

        return redirect()->route('company.index')
            ->with('success','User updated successfully');
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
