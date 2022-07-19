<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Order;
use DB;
use PDF;
//use PdfReport;

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
          ->select('cards.gnr', 'cards.farmer','cards.vehicle_no', 'cards.crates', \DB::raw("SUM(cartons) as cartons"), \DB::raw("SUM(supplier_total) as supplier_total"),\DB::raw("SUM(orders.profit) as profit"),\DB::raw("SUM(orders.sub_total) as sub_total"),'cards.created_on')
          ->join('orders', 'cards.gnr', '=', 'orders.gnr')
          ->where('cards.created_on', 'LIKE', "%{$search}%")
         //->where('cards.created_on', '=', date('Y-m-d'))
          ->groupBy('orders.gnr')
          ->get();
          $totals = DB::table('cards')
          ->select('cards.gnr', 'cards.farmer','cards.vehicle_no', 'cards.crates', \DB::raw("SUM(cartons) as cartons"), \DB::raw("SUM(supplier_total) as supplier"),\DB::raw("SUM(orders.profit) as profit"),\DB::raw("SUM(orders.sub_total) as framlil"),'cards.created_on')
          ->join('orders', 'cards.gnr', '=', 'orders.gnr')
          ->where('cards.created_on', 'LIKE', "%{$search}%")
         //->where('cards.created_on', '=', date('Y-m-d'))
          //->groupBy('orders.gnr')
          ->get();

        return view('inventories.index',compact('inventories','totals'));
    }
    public function generatePDF(Request $request)
    {
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');

        $query = DB::table('cards')->select()
        ->where('created_on', '>=', $fromDate)
        ->where('created_on', '<=', $toDate)
        ->get();
        return view('inventories.inventoriesPDF',compact('query'));
        //dd($query);
        $inventories = DB::table('cards')
        ->select('cards.gnr', 'cards.farmer','cards.vehicle_no', 'cards.crates','cards.created_on')
        ->join('orders', 'cards.gnr', '=', 'orders.gnr')
        ->get();
        
       /* $data = [
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
        return $pdf->download('Inventory Report.pdf');*/
    }

    public function displayReport(Request $request)
{
    $fromDate = $request->input('from_date');
    $toDate = $request->input('to_date');
    $sortBy = $request->input('sort_by');

    $title = 'Registered Farmers Report'; // Report title

    $meta = [ // For displaying filters description on header
        'Registered on' => $fromDate . ' To ' . $toDate,
        'Sort By' => $sortBy
    ];

    $queryBuilder = DB::table('orders')->select();
    dd( $queryBuilder);
    // Do some querying..
                        //->whereBetween('created_at', [$fromDate, $toDate]);
                        //->orderBy($sortBy);

                        $columns = [ // Set Column to be displayed
                            'GNR' => 'gnr',
                            'Created At', // if no column_name specified, this will automatically seach for snake_case of column name (will be registered_at) column from query result
                            'Total Balance' => 'balance',
                            'Status' => function($result) { // You can do if statement or any action do you want inside this closure
                                return ($result->balance > 100000) ? 'Rich Man' : 'Normal Guy';
                            }
                        ];

                        return PdfReport::of($title, $meta, $queryBuilder, $columns)
                    ->editColumn('Created At', [
                        'displayAs' => function($result) {
                            return $result->registered_at->format('d M Y');
                        }
                    ])
                    ->editColumn('Total Balance', [
                        'class' => 'right bold',
                        'displayAs' => function($result) {
                            return thousandSeparator($result->balance);
                        }
                    ])
                    ->editColumn('Status', [
                        'class' => 'right bold',
                    ])
                   
                    ->stream();
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
