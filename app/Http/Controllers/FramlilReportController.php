<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class FramlilReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventories=DB::select('select cards.gnr, cards.vehicle_no, cards.farmer, cards.crates, sum(orders.sub_total) as supplier, sum(orders.supplier_total) as framlil, sum(orders.profit) as profit, sum(orders.cartons) as cartons, cards.created_on, orders.gnr
        from orders   
        inner join cards
        on orders.gnr = cards.gnr
        group by orders.gnr
        order by cards.created_on;');

        $totals = DB::select('select sum(sub_total) as supplier , sum(supplier_total) as framlil, sum(profit) as profit FROM orders');
        
        return view('framlils.index',compact('inventories','totals'));
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
          
        $pdf = PDF::loadView('framlils.framlilsPDF',compact('inventories','totals'), $data);
        return $pdf->download('Framils Report.pdf');
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
