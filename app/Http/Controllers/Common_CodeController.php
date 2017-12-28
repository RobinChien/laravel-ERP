<?php

namespace App\Http\Controllers;

use App\Common_Code;
use App\Permission;
use Illuminate\Http\Request;

class Common_CodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $commons = Common_Code::orderBy('parent_id','ASC')->paginate(5);
        return view('commoncode.index',compact('commons'))
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
        $parent = Common_Code::pluck('code_name', 'id')->all();
        $collection = collect(['#'=>'#']);
        foreach ($parent as $key => $value) {
            $collection->put($key, $value);
        }
        $parents=$collection->all();

        $permissions = Permission::where('parent_id', '#')->pluck('display_name', 'id');

        return view('commoncode.create',compact('parents','permissions'));

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
            'code_name' => 'required|string|max:150',
            'parent' => 'required',
            'permission' => 'required',
        ]);
//        dd($request->input('permission'));

        $common = new Common_Code();
        $common->code_name = $request->input('code_name');
        $common->parent_id = $request->input('parent');
        $common->permission_id = $request->input('permission');
        $common->save();
        return redirect()->route('commoncode.index')
            ->with('success','Common Code created successfully');
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
        $common = Common_Code::find($id);
        return view('commoncode.show',compact('common'));
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

        $parent = Common_Code::pluck('code_name', 'id')->all();
        $collection = collect(['#'=>'#']);
        foreach ($parent as $key => $value) {
            $collection->put($key, $value);
        }
        $parents=$collection->all();

        $permissions = Permission::where('parent_id', '#')->pluck('display_name', 'id');
        $common = Common_Code::find($id);
        return view('commoncode.edit',compact('common','parents','permissions'));
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
            'code_name' => 'required|string|max:150',
            'parent' => 'required',
            'permission' => 'required',
        ]);

        $common = Common_Code::find($id);
        $common->code_name = $request->input('code_name');
        $common->parent_id = $request->input('parent');
        $common->permission_id = $request->input('permission');
        $common->save();


        return redirect()->route('commoncode.index')
            ->with('success', 'Common Code updated successfully');
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
