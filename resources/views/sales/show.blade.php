@extends('layouts.master')
@section('content')
<div class="container">
    <h1 class="m-0">Step 2: SELL POINT</h1>
    <div class="row">
<div class="col-sm-6">
        <div>
        @foreach ($cards as $item)
        <h4>Farmer Name:{{ $item->farmer }}</h4>
        <h4>Vehicle No:{{ $item->vehicle_no }}</h4>
        <h4>Date Processed: {{ $item->created_on }}</h4>
        <h4>No of Crates: {{ $item->crates }}</h4>
        <h4></h4>
        @endforeach
        </div>
  <div class="table-responsive">
        <table id="table" class="table">
            <thead>
                <tr>
                    <th>Size</th>
                    <th>Weight</th>
                    <th>Buying Price</th>
                    <th>Selling Price</th>
                    <th>Cartons</th>
                    <th>Buying Sub Total</th>
                    <th>Supplier Sub Total</th>
                    <th>Profit</th>
                    <!--th>Delete</th-->
                    <tr>
                      <thead>
                      <tbody>
                      @foreach ($sales as $sale)
                        <tr>
                          <td>{{ $sale->size }}</td>
                          <td>{{ $sale->weight}}</td>
                          <td>{{ $sale->buying_price}}</td>
                          <td>{{ $sale->selling_price}}</td>
                          <td>{{ $sale->cartons}}</td>
                          <td>{{ $sale->sub_total}}</td>
                          <td>{{ $sale->supplier_total}}</td>
                          <td>{{ $sale->profit}}</td>
                          <!--td>
                                <form action="{{ route('sales.destroy', $sale->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </form>
                            </td-->
                        </tr>
              @endforeach         
</tbody>

</table>
<div>@foreach ($totals as $total1)
    <h5>Supplier Total: <th>{{ $total1->Total}}</th></h5>
    @endforeach

    @foreach ($totals2 as $supplier)
    <h5>Framlil Price: <th>{{ $supplier->supplier}}</th></h5>
    @endforeach

    @foreach ($profits as $item2)
    <h5>Profit: <th>{{ $item2->profit}}</th></h5>
    @endforeach

    @foreach ($cartons as $item)
    <h5>Cartons: <th>{{ $item->Carton}}</th></h5>
    @endforeach
</div>
@endsection