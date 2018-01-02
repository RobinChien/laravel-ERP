<?php

namespace App\Http\Controllers;

use App\Product_Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Product_CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $product_categories = $this->product_category_tree();
        return view('product_categories.index', compact('product_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->product_category_tree();
        $product_categories = array_pluck($categories, 'treeitem','id');
//        dd($product_categories);
        return view('product_categories.create', compact('product_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:150',
            'category_parent' => 'sometimes',
            'category_child' => 'sometimes',
        ]);

        $input = $request->only('category_name');

        if (isset($request['category_parent']))
        {
            $input['parent_id'] = '#';
        }
        else
        {
            $input['parent_id'] = $request['category_child'];
        }
        Product_Category::create($input);
        return redirect()->route('product_categories.index')
            ->with('success', '類別新增成功');

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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Product_Category::find($id);
        $product_categories = collect($this->product_category_tree());
        $product_categories = $product_categories->pluck('treeitem','id')->all();
//        dd($categories);
        return view('product_categories.edit', compact('categories', 'product_categories'));
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
        $request->validate([
            'category_name' => 'required|string|max:150',
            'category_parent' => 'sometimes',
            'category_child' => 'sometimes',
        ]);

        $input = $request->only('category_name');
        if (isset($request['category_parent']))
        {
            $input['parent_id'] = '#';
        }
        else
        {
            $input['parent_id'] = $request['category_child'];
        }

        $category = Product_Category::find($id);
        $category->update($input);

        return redirect()->route('product_categories.index')
            ->with('success', 'User updated successfully');
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

    public function product_category_tree()
    {
        $product_category = Product_Category::where('parent_id', '=', '#')->get();
        foreach ($product_category as $key => $value)
        {
            $sql = "select * from product_categories where FIND_IN_SET(id, getchildlinelist($value->id))";
            $categories = DB::select(DB::raw($sql));
            foreach ($categories as $subkey => $subvalue){
                $pcs[] = ['treeitem'=>$subvalue->category_name, 'id'=>$subvalue->id, 'parent_id'=>$subvalue->parent_id];
            }
        }
//        dd($pcs);
        return $pcs;
    }
}
