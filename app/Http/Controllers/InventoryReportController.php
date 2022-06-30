<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Order;
use DB;
use PDF;

class InventoryReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
          $inventories = DB::table('cards')
          ->leftJoin('orders', 'cards.gnr', '=', 'orders.gnr')
          ->select('cards.gnr', 'cards.farmer','cards.vehicle_no', 'cards.crates', \DB::raw("SUM(cartons) as cartons"), \DB::raw("SUM(supplier_total) as supplier_total"),\DB::raw("SUM(orders.profit) as profit"),\DB::raw("SUM(orders.sub_total) as sub_total"),'cards.created_on')
         ->where('cards.created_on', 'LIKE', "%{$search}%")
         //->where('cards.created_on', '=', date('Y-m-d'))
          ->groupBy('orders.gnr')
          ->get();
        $totals = DB::select('select sum(sub_total) as supplier , sum(supplier_total) as framlil, sum(profit) as profit FROM orders');
        //dd($inventories);
        return view('inventories.index',compact('inventories','totals'));
    }
    public function generatePDF()
    {
        $data = [
            'title' => 'Framils Report',
            'date' => date('m/d/Y')
        ];  
        $inventories=DB::select('select cards.gnr, cards.vehicle_no, cards.farmer, cards.crates, sum(orders.sub_total) as supplier, sum(orders.supplier_total) as framlil, sum(orders.profit) as profit, sum(orders.cartons) as cartons, cards.created_on, orders.gnr
        from orders   
        inner join cards
        on orders.gnr = cards.gnr
        group by orders.gnr
        order by cards.created_on;');

        $totals = DB::select('select sum(sub_total) as supplier , sum(supplier_total) as framlil, sum(profit) as profit FROM orders');
          
        $pdf = PDF::loadView('inventories.inventoriesPDF',compact('inventories','totals'), $data);
        return $pdf->download('Inventory Report.pdf');
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
