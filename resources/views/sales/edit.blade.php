@extends('layouts.master')
@section('content')
<div class="container">

<div class="card">
<div class="card-header">
<h3 class="card-title">Edit Sales</h3>
</div>
<div class="card-body">

<table class="table table-bordered">
<thead>
                <tr>
                    <th>GNR No.</th>
                    <th>Farmer</th>
                    <th>Crates</th>
                    <th>Cartons</th>
                    <th>Vehicle Reg</th>
                    <th>Supplier Report</th>
                    <th>Framlil Report</th>
                    <!--th>Profit</th-->
                    <th>Date</th>
                    <th colspan="2">Action</th>
</thead>
<tbody>
@foreach ($inventories as $item)
<tr>
                          <td>{{ $item->gnr }}</td>
                          <td>{{ $item->farmer }}</td>
                          <td>{{ $item->crates }}</td>
                          <td>{{ $item->cartons}}</td>
                          <td>{{ $item->vehicle_no }}</td>
                          <td>{{ $item->supplier}}</td>
                          <td>{{ $item->framlil }}</td>
                          <td>{{ $item->created_on }}</td>
                          <!--td><button class="btn btn-success" type="submit"><i class="fas fa-eye"></td-->
                          <td><a href="/orders/{{$item->gnr}}" class="btn btn-primary"><i class="fas fa-edit"></i></a></td>
                          <td>
                            <form action="{{ route('sales.destroy', $item->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                            
                            </form>
                            </td>
</tr>
@endforeach         
</tbody>

</table>
</div>
</div>
</div>
</div>
@endsection