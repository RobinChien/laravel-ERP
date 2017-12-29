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
//        dd($product_categories);
        return view('product_categories.index', compact('product_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_categories = collect($this->product_category_tree());
        $product_categories = $product_categories->pluck('treeitem','id')->all();
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
        $sql = "SELECT  CONCAT(REPEAT('—', level - 1), category_name) AS treeitem, ho.id, parent_id, level
                FROM    (
                        SELECT  product_categories_connect_by_parent_eq_prior_id(id) AS id, @level AS level
                        FROM    (
                                SELECT  @start_with := 0,
                                        @id := @start_with,
                                        @level := 0
                                ) vars, product_categories
                        WHERE   @id IS NOT NULL
                        ) ho
                JOIN    product_categories hi
                ON      hi.id = ho.id";
        $product_category  = DB::select(DB::raw($sql));

//        dd($product_category);
        return $product_category;
    }
}
