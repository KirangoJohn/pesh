<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Card;
use App\Models\Sale;

class DropdownController extends Controller
{
    public function index()
    {
        $sizes = DB::table("sizes")->pluck("size", "id");
        $fruits = DB::table("fruits")->pluck("name", "id");
        $cards= Card::latest()->take(1)->get();
        $sales= Sale::all();
        return view('sales', compact('sizes', 'fruits', 'cards', 'sales'));
    }

    public function getWeight(Request $request)
    {
        $weights = DB::table("weights")
            ->where("size_id", $request->size_id)
            ->pluck("weight", "id");
        return response()->json($weights);
    }

    public function store(Request $request)
    {
        $size = $request->input('size');
        $weight = $request->input('weight');
        $cartons  = $request->input('cartons ');
        $fruit_type = $request->input('fruit_type');
        $buying_price = $request->input('buying_price');
        $selling_price = $request->input('selling_price');
        DB::insert('insert into sales (size, weight, cartons, fruit_type, buying_price, selling_price) 
        values(?,?,?,?,?,?)',[$size, $weight, $cartons,$fruit_type, $buying_price, $selling_price]);
   
        return redirect('sales');
    }

}
