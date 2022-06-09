<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Card;
use App\Models\Sale;
use App\Models\Order;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $sizes = DB::table("sizes")->pluck("size", "id");
        $fruits = DB::table("fruits")->pluck("name", "id");
      
        //$cards1=Card::orderBy('created_at', 'desc')->pluck("gnr", "gnr")->first();
        $cards1 = DB::table("cards")->orderBy('id', 'DESC')->pluck("gnr", "gnr")->take(1);
        $cards= DB::select('SELECT cards.vehicle_no, cards.gnr, cards.created_on, cards.farmer, cards.crates, cards.created_on FROM cards ORDER BY cards.id DESC LIMIT 1; ');
        $sales= DB::select('SELECT sales.id,sales.weight, sales.cartons, sales.buying_price, sales.selling_price, sizes.id, sizes.size,sales.sub_total,sales.supplier_total,sales.profit, sales.gnr FROM sales INNER JOIN sizes ON sales.size_id = sizes.id;');
        $totals = DB::select('select sum(sub_total) as Total FROM sales');
       $totals2 = DB::select('select sum(supplier_total) as supplier FROM sales');
        $profits = DB::select('select sum(profit) as profit FROM sales');
        // FROM sales');
         $cartons = DB::select('select sum(cartons) as Carton FROM sales');

         $orders = DB::select('SELECT orders.id,orders.weight, orders.cartons, orders.buying_price, orders.selling_price, sizes.id, sizes.size,orders.sub_total,orders.supplier_total,orders.profit, orders.gnr FROM orders INNER JOIN sizes ON orders.size_id = sizes.id;');

         
        return view('sales', compact('cards1','sizes', 'fruits', 'cards', 'sales', 'totals','cartons','totals2','profits'));
    }

    public function getWeight(Request $request)
    {
        $weights = DB::table("weights")
            ->where("size_id", $request->size_id)
            ->pluck("weight", "id");
        return response()->json($weights);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inventories=DB::select('select orders.id, cards.gnr, cards.vehicle_no, cards.farmer, cards.crates, sum(orders.sub_total) as supplier, sum(orders.supplier_total) as framlil, sum(orders.profit) as profit, sum(orders.cartons) as cartons, cards.created_on, orders.gnr
        from orders   
        inner join cards
        on orders.gnr = cards.gnr
        group by orders.gnr
        order by cards.created_on;');

        //$totals = DB::select('select sum(sub_total) as supplier , sum(supplier_total) as framlil, sum(profit) as profit FROM orders');
        

        return view('sales.edit',compact('inventories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        DB::insert('insert into sales (gnr,size_id, weight, cartons, fruit_type, buying_price, selling_price, sub_total, profit,supplier_total) 
        values(?,?,?,?,?,?,?,?,?,?)',[$gnr, $size_id, $weight, $cartons,$fruit_type, $buying_price, $selling_price, $sub_total, $profit, $supplier_total]);
     
        return redirect('sales');
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
        $sales = Order::findOrFail($id);
        return view('sales.editsales', compact('sales'));
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
    public function destroy(Sale $sale)
    {
        $sale->delete();
        return redirect('sales');
    }

    public function delete(Sale $sale)
    {
       
    }
}
