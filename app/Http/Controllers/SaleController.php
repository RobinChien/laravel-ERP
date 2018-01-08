<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Product;
use App\Sale_details;
use App\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $sales = Sales::where('sales_type',0)->orderBy('id', 'ASC')->paginate(5);
        return view('sale.index', compact('sales'))
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
        $customers = Customer::pluck('customer_name', 'id')->all();

        $collection = collect(['0'=>'請選擇']);
        foreach ($customers as $key => $value) {
            $collection->put($key, $value);
        }
        $customer=$collection->all();
        $user_name=Auth::user()->user_name;

        $products=Product::pluck('product_name','id');
        $col = collect(['0'=>'請選擇']);
        foreach ($products as $key => $value) {
            $col->put($key, $value);
        }
        $product=$col->all();

//        $array=Array();
//        $i=0;
//        foreach ($products as $key => $value) {
//            $array = array_add($array, $i, ['id'=>$key,'product_name'=>$value]);
//            $i++;
//        }
//
//        $products=Product::where('manufacturer_id', 2)->get();
//        dd(json_encode($array));
        return view('sale.create', compact('customer','user_name','product'))->with('i',0);
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
//dd($request);
        $request->validate([
            'customer_id' => 'required',
            'product_id' => 'required|array',
            'product_id.*' => 'required',
            'qty' => 'required|array|min:1',
            'qty.*' => 'required|numeric|min:1',
            'price' => 'required|array|min:1',
            'price.*' => 'required|numeric|min:1',
        ]);
        $sale=Sales::where('sales_type',0)->orderBy('id', 'DESC')->first();
//        dd($sale);
        if($sale==null){
            $sale=1;
        }else{

            $sale=(int)(substr($sale->sales_no,-6));
//            dd($sale);

            $sale++;
        }
        $sale=str_pad($sale,6,'0',STR_PAD_LEFT);;

        $input['sales_no']="0".date("Ymd").$sale;
        $input['customer_id']=$request['customer_id'];
        $input['user_id']=Auth::user()->user_id;
        $input['sales_type']=0;

//        dd($input);
        $sale_id=Sales::create($input)->id;
//        dd($request->input('product_id'));
        $i=1;
        foreach ($request->input('product_id') as $key => $value) {
            if($value=="0"){
                continue;
            }
            $detail['sale_id']=$sale_id;
            $detail['sale_detail_no']=$i;
            $detail['product_id']=$value;
            $detail['sale_qty']=$request['qty'][$key];
            $detail['sale_price']=$request['price'][$key];
//            dd($detail);
            Sale_details::create($detail);
            $i++;

            $stock = Product::find($detail['product_id']);

            $stock->product_stock =$stock->product_stock-$detail['sale_qty'];

            $stock->save();

        }
        return redirect()->route('sale.index')
            ->with('success', '單號：'.$input['sales_no'].' 新增成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        ////
        $sale = Sales::find($id);
        $details=Sale_details::where('sale_id', $id)->get();
//        dd($detail);
        $total=0;
        foreach ($details as $detail){
            $total=$total+$detail['sale_qty']*$detail['sale_price'];
        }
        return view('sale.show', compact('sale','details','total'));
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
