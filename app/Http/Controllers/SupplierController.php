<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fromDate = $request->input('fromDate');
       $toDate = $request->input('toDate');
        

       $query= DB::table('orders')->select()
       ->where('created_at', '>=', "%{$fromDate}%")
       ->where('created_at', '>=', "%{$toDate}%")
        ->get();

        //dd($query);
          
        $supp = DB::table('cards')
        ->select('cards.farmer', 'cards.crates', 'orders.gnr')
        ->join('orders','cards.gnr','=','orders.gnr')
        ->get();

        //dd($query);

        return view('suppliers.index', compact('query','supp'));
    }
    public function search(Request $request)
    {
         $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');
        

       $query= DB::table('orders')->select()
        ->where('created_on', '>=', $fromDate)
        ->where('created_on', '>=', $toDate)
        ->get();

        dd($query);

        $supp = DB::table('cards')
        ->select('cards.farmer', 'cards.crates', 'orders.gnr')
        ->join('orders','cards.gnr','=','orders.gnr')
        ->get();

        //dd($query);

        return view('suppliers.report', compact('query','supp'));
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
