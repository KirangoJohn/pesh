<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Card;
//use App\Models\Sale;
use App\Models\Order;

use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$farmers = DB::select('count')
        $totals2 = DB::select('select count(id) as ids, sum(supplier_total) as supplier , sum(cartons) as cartons FROM orders');
        return view('home', compact('totals2'));
    }
}
