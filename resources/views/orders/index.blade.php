@extends('layouts.master')
@section('content')
<div class="container">

<div class="card">
<div class="card-header">
<h3 class="card-title">Edit Sales</h3>
</div>
<div class="card-body">
<form action="{{ route('orders.index') }}" method="GET">
<div class="form-group">
<div class="row">
<div class="col-sm-8">
    <input type="text" name="search" placeholder="Search" class="form-control">
</div>
<div class="col-sm-4">
    <button class="btn btn-primary" type="submit">Search</button> 
    <form action="{{ route('orders.index') }}">
  <button class="btn btn-success" type="submit">Referesh</button>
  <button onclick="window.print()">Print this page</button>
</form>  
</div>
</div>
</div>

</form>

<table class="table table-bordered">
<thead>
                <tr>
                    <th>GNR No.</th>
                    <th>Size</th>
                    <th>Weight</th>
                    <!--th>Fruit</th-->
                    <th>Cartons</th>
                    <th>Buying Price</th>
                    <th>Selling Price</th>
                    <th>Supplier</th>
                    <th>Framril</th>
                    <th>Profit</th>
                    <th colspan="2"></th>
</thead>
<tbody>
@foreach($orders as $order)
<tr>
                         <td>{{$order->gnr}}</td>
                         <td>{{$order->size}}</td>
                         <td>{{$order->weight}}</td>
                         <!--td>{{$order->fruit_type}}</td-->
                         <td>{{$order->cartons}}</td>
                         <td>{{$order->buying_price}}</td>
                         <td>{{$order->selling_price}}</td>
                         <td>{{$order->sub_total }}</td>
                         <td>{{$order->supplier_total}}</td>
                         <td>{{$order->profit}}</td>
                         <td><a href="{{ route('orders.edit', $order->id)}}" class="btn btn-primary">Edit</a></td>
                        <td>
                        <form action="{{ route('orders.destroy', $order->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
</tr>
@endforeach   
</tbody>
</table>
<script type="text/javascript">
    $('#search').on('keyup',function()
    {
        alert('John Maina');
    })
</script>
</div>
</div>
</div>
</div>
@endsection