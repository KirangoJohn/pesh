<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$orders = DB::select('SELECT orders.id,orders.weight, orders.cartons, orders.buying_price, orders.selling_price, sizes.id as si, sizes.size,orders.fruit_type,orders.sub_total,orders.supplier_total,orders.profit, orders.gnr FROM orders INNER JOIN sizes ON orders.size_id = sizes.id;');
        return view('orders.index', compact('orders'));*/
        
        $search = $request->get('search');

        $orders = DB::table('orders')
        ->leftJoin('sizes', 'orders.size_id', '=', 'sizes.id')
        ->select('orders.id','orders.weight', 'orders.cartons', 'orders.buying_price', 'orders.selling_price', 'sizes.id as si', 'sizes.size','orders.fruit_type','orders.sub_total','orders.supplier_total','orders.profit', 'orders.gnr')
        ->where('orders.gnr', 'LIKE', "%{$search}%")
        ->get();
        return view('orders.index', compact('orders'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //DB::insert('insert into export.sales (gnr,size_id, weight, cartons, fruit_type, buying_price, selling_price, sub_total, profit,supplier_total)   SELECT gnr,size_id, weight, cartons, fruit_type, buying_price, selling_price, sub_total, profit,supplier_total from export.sales');
        DB::insert ('INSERT INTO orders SELECT * from export.sales');
        DB::table('sales')->delete();

        return redirect('cards/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //DB::select('select * FROM orders');
       return Order::find($id);
    }

    public function toEdit(){

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sizes = DB::table("sizes")->pluck("size", "id");
        $fruits = DB::table("fruits")->pluck("name", "name");
        $orders = Order::findOrFail($id);
        return view('orders.edit', compact('orders','sizes','fruits'));
        
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
        $gnr  = $request->input('gnr');
        $size_id = $request->input('size_id');
        $weight = $request->input('weight');
        $cartons  = $request->input('cartons');
        $fruit_type = $request->input('fruit_type');
        $buying_price = $request->input('buying_price');
        $selling_price = $request->input('selling_price');
        if($size_id <= 12 && $weight == 10){
            $sub_total = ($buying_price*2.5)*$cartons;
        }else{
            $sub_total = $buying_price*$cartons;
        }
        if($size_id <= 12 && $weight == 10){
            $supplier_total = ($selling_price*2.5)*$cartons;
        }else{
            $supplier_total = $selling_price*$cartons;
        }
        if($size_id <= 12 && $weight == 10){
        $profit = ($selling_price*2.5*$cartons)-($buying_price*2.5*$cartons);
    }else{
        $profit = ($selling_price*$cartons)-($buying_price*$cartons);
    }
        DB::update('update orders set gnr=?,size_id=?, weight=?, cartons=?, fruit_type=?, buying_price=?, selling_price=?, sub_total=?, profit=?,supplier_total=? WHERE id=?', 
        [$gnr, $size_id, $weight, $cartons,$fruit_type, $buying_price, $selling_price, $sub_total, $profit, $supplier_total, $id]);
     
        return redirect('orders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect('orders')->with('success', 'Data is successfully deleted');
    }
}
