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
        $product_categories = $this->getChildCategories();
        $common_code = Common_Code::pluck('code_name', 'id')->all();
        $manufacturer = Manufacturer::pluck('manufacturer_name', 'id')->all();
        $product = Product::select('product_name','id', 'product_or_item', 'product_code')->get();
        return view('product.create', compact('product_categories', 'common_code','manufacturer', 'product'));
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
            'product_code' => 'required|string|max:10|unique:products',
            'product_name' => 'required|string|max:150',
            'category_id' => 'required',
            'product_price' => 'required',
            'common_id' => 'required',
            'manufacturer_id' => 'required',
            'product_status' => 'sometimes',
            'product_or_item' => 'required',
            'data' => 'sometimes',
        ]);

        $input = $request->except('data');
        if ($request['product_status'] == 1)
        {
            $input['product_status'] = 1;
        }
        else
        {
            $input['product_status'] = 0;
        }

        $product = Product::create($input);
//        dd($request->input('data')[0]['qty']);
        if($request->input('product_or_item')!=2) {
            foreach ($request->input('data') as $key => $value) {
                $product->bom()->attach($value['product_name'], array("qty" => $value['qty']));
            }
        }
//        return redirect()->route('product.index')
//            ->with('success', '商品新增成功');
        return json_encode($msg[0]="success");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $product_table = $this->getChildCategories($id);
//        dd($product_table);
        return view('product.show',compact('product', 'product_table'));
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
        $product_categories = $this->getChildCategories();
        $common_code = Common_Code::pluck('code_name', 'id')->all();
        $manufacturer = Manufacturer::pluck('manufacturer_name', 'id')->all();
        $product_table = Product::select('product_name','id', 'product_or_item', 'product_code')->get();
        $item = DB::table('bom')->join('products','id','=','child_id')->where('parent_id',$id)->get();
//        dd($item);
        return view('product.edit', compact('product', 'product_categories', 'common_code', 'manufacturer', 'product_table', 'item'));
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
            'product_or_item' => 'required',
            'data' => 'sometimes',
        ]);

        $input = $request->except('data');
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
        if($request->input('product_or_item')!=2){
            foreach ($request->input('data') as $key => $value){
                $product->bom()->attach($value['product_name'],array("qty"=>$value['qty']));
            }
        }

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

    public function getChildCategories($of_id)
    {
        $item = [];
        $categories = DB::table('bom')->join('products','id','=','child_id')->where('parent_id', $of_id )->get();
//        dd($categories);
        foreach ( $categories as $category ) {
            $childs = $this->getChildCategories( $category->child_id );
//            dd($childs);
            $item[] = compact( 'category', 'childs' );
        }
        return $item;
    }
    
}
