@extends('layouts.master')
@section('content')
<button onclick="window.print()">Print this Report</button>
<div class="container">
Framlil Report

@foreach ($totals as $item1)
    <h5>Supplier Total: {{ $item1->supplier}}</h5>
    <h5>Framlil Total: {{ $item1->framlil}}</h5>
    <!--h5>Profit Total: {{ $item1->profit}}</h5-->
        @endforeach
        <!--div><a href="{{url('framlil/framlilsPDF')}}">Download PDF</a></div-->
        
<table class="table table-bordered">
<thead>
                <tr>
                    <th>GNR No.</th>
                    <th>Farmer</th>
                    <th>Crates</th>
                    <th>Cartons</th>
                    <th>Vehicle Reg</th>
                    <!--th>Supplier Report</th-->
                    <th>Framlil Report</th>
                    <!--th>Profit</th-->
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
                          <!--td>{{ $item->supplier}}</td-->
                          <td>{{ $item->framlil }}</td>
                          <!--td>{{ $item->profit }}</td-->
                          <td>{{ $item->created_on }}</td>
</tr>
@endforeach         
</tbody>

</table>
</div>

@endsection