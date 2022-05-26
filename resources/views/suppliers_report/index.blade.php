@extends('layouts.master')
@section('content')
<div class="container">

<div class="card">
<div class="card-header">
<h3 class="card-title">Suppliers Report</h3>
</div>
<div class="card-body">
@foreach ($totals as $item1)
    <h5>Supplier Total: {{ $item1->supplier}}</h5>
   
        @endforeach
        <div><a href="{{url('suppliers_reports/supplierPDF')}}">Download PDF</a></div>
<table class="table table-bordered">
<thead>
                <tr>
                    <th>GNR No.</th>
                    <th>Farmer</th>
                    <th>Crates</th>
                    <th>Cartons</th>
                    <th>Vehicle Reg</th>
                    <th>Supplier Report</th>
                    <th>Date</th>
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
                          <td>{{ $item->created_on }}</td>
</tr>
@endforeach         
</tbody>

</table>
</div>
</div>
</div>
</div>
@endsection