<?php

namespace App\Http\Controllers;

use App\Manufacturer;
use App\Product;
use App\Purchase;
use App\PurchaseDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $purchases = Purchase::where('purchases_type',0)->orderBy('id', 'ASC')->paginate(5);
        return view('purchase.index', compact('purchases'))
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
        $manufacturers = Manufacturer::pluck('manufacturer_name', 'id')->all();

        $collection = collect([''=>'請選擇']);
        foreach ($manufacturers as $key => $value) {
            $collection->put($key, $value);
        }
        $manufacturer=$collection->all();
        $user_name=Auth::user()->user_name;

        $products=Product::where('manufacturer_id', 2)->pluck('product_name','id');
        $array=Array();
        $i=0;
        foreach ($products as $key => $value) {
            $array = array_add($array, $i, ['id'=>$key,'product_name'=>$value]);
            $i++;
        }

        $products=Product::where('manufacturer_id', 2)->get();
//        dd(json_encode($array));
        return view('purchase.create', compact('manufacturer','user_name'))->with('i',0);
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
            'manufacturer_id' => 'required',
            'product_id' => 'required|array',
            'product_id.*' => 'required',
            'qty' => 'required|array|min:1',
            'qty.*' => 'required|numeric|min:1',
            'price' => 'required|array|min:1',
            'price.*' => 'required|numeric|min:1',
        ]);
        $purchase=Purchase::where('purchases_type',0)->orderBy('id', 'DESC')->first();
//        dd($purchase);
        if($purchase==null){
            $purchase=1;
        }else{

            $purchase=(int)(substr($purchase->purchases_no,-6));
//            dd($purchase);

            $purchase++;
        }
        $purchase=str_pad($purchase,6,'0',STR_PAD_LEFT);;

        $input['purchases_no']="0".date("Ymd").$purchase;
        $input['manufacturer_id']=$request['manufacturer_id'];
        $input['user_id']=Auth::user()->user_id;
        $input['purchases_type']=0;

//        dd($input);
        $purchase_id=Purchase::create($input)->id;
        $i=1;
        foreach ($request->input('product_id') as $key => $value) {
            if($value=="0"){
                continue;
            }
            $detail['purchase_id']=$purchase_id;
            $detail['purchase_detail_no']=$i;
            $detail['product_id']=$value;
            $detail['purchase_qty']=$request['qty'][$key];
            $detail['purchase_price']=$request['price'][$key];
//            dd($detail);
            PurchaseDetail::create($detail);
            $i++;

            $stock = Product::find($detail['product_id']);

            $stock->product_stock =$detail['purchase_qty'];

            $stock->save();

        }
        return redirect()->route('purchase.index')
            ->with('success', '單號：'.$input['purchases_no'].' 新增成功');
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
        $purchase = Purchase::find($id);
        $details=PurchaseDetail::where('purchase_id', $id)->get();
//        dd($detail);
        $total=0;
        foreach ($details as $detail){
            $total=$total+$detail['purchase_qty']*$detail['purchase_price'];
        }
        return view('purchase.show', compact('purchase','details','total'));
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

    public function manufacturer(Request $request)
    {
        //
        $products=Product::where('manufacturer_id', $request->categories)->pluck('product_name','id');
        $array=Array();
        $array = array_add($array, 0, ['id'=>'0','product_name'=>'請選擇']);

        $i=1;
        foreach ($products as $key => $value) {
            $array = array_add($array, $i, ['id'=>$key,'product_name'=>$value]);
            $i++;
        }

        $collection = collect(['0'=>'請選擇']);
        foreach ($products as $key => $value) {
            $collection->put($key, $value);
        }
        $product=$collection->all();


        return json_encode($array);
    }
}
