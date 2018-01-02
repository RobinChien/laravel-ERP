<?php

namespace App\Http\Controllers;

use App\Common_Code;
use App\Manufacturer;
use App\Product;
use App\Product_Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::orderBy('id', 'ASC')->paginate(5);
        $product_category = Product_Category::all();
        return view('product.index', compact('products'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->product_category_tree();
        $product_categories= array_pluck($categories, 'treeitem','id');
        $common_code = Common_Code::all();
        $manufacturer = Manufacturer::all();
        return view('product.create', compact('product_categories', 'common_code','manufacturer'));
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
            'product_code' => 'required|string|max:10',
            'product_name' => 'required|string|max:150',
            'category_id' => 'required',
            'product_price' => 'required',
            'common_id' => 'required',
            'manufacturer_id' => 'required',
            'product_status' => 'sometimes',
            'product_isitem' => 'sometimes',
        ]);

        $input = $request->all();
        if (isset($request['product_status']))
        {
            $input['product_status'] = 1;
        }
        else
        {
            $input['product_status'] = 0;
        }

        if (isset($request['product_isitem']))
        {
            $input['product_isitem'] = 1;
        }
        else
        {
            $input['product_isitem'] = 0;
        }
        Product::create($input);
        return redirect()->route('product.index')
            ->with('success', '商品新增成功');
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
        $product = Product::find($id);
        $product_categories = collect($this->product_category_tree());
        $product_categories = $product_categories->pluck('treeitem','id')->all();
        $common_code = Common_Code::all();
        $manufacturer = Manufacturer::all();
//        dd($categories);
        return view('product_categories.edit', compact('product', 'product_categories', 'common_code', 'manufacturer'));
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
            'product_code' => 'required|string|max:10',
            'product_name' => 'required|string|max:150',
            'category_id' => 'required',
            'product_price' => 'required',
            'common_id' => 'required',
            'manufacturer_id' => 'required',
            'product_status' => 'sometimes',
            'product_isitem' => 'sometimes',
        ]);

        $input = $request->all();
        if (isset($request['product_status']))
        {
            $input['product_status'] = 1;
        }
        else
        {
            $input['product_status'] = 0;
        }

        if (isset($request['product_isitem']))
        {
            $input['product_isitem'] = 1;
        }
        else
        {
            $input['product_isitem'] = 0;
        }
        $product = Product::find($id);
        $product->update($input);

        return redirect()->route('product.index')
            ->with('success', '商品成功');
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

    public function status($status, $id)
    {
        $product = Product::find($id);
        if (empty($product)) {
            return redirect()->route('product.index')->with('success', '狀態更新失敗');
        }
        $product->update(['product_status' => $status]);

        return redirect()->route('product.index')
            ->with('success', '狀態更新成功');
    }

    public function product_category_tree()
    {
        $product_category = Product_Category::where('parent_id', '=', '#')->get();
        foreach ($product_category as $key => $value)
        {
            $sql = "select * from product_categories as a where FIND_IN_SET(id, getchildlinelist($value->id))";
            $categories = DB::select(DB::raw($sql));
            foreach ($categories as $subkey => $subvalue){
                $pcs[] = ['treeitem'=>$subvalue->category_name, 'id'=>$subvalue->id, 'parent_id'=>$subvalue->parent_id];
            }
        }
        return $pcs;
    }
}
