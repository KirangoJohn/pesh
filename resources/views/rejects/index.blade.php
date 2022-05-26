@extends('layouts.master')
@section('content')
<div class="container">

<div class="card">
<div class="card-header">
<h3 class="card-title">Rejects Report</h3>
</div>
<div class="card-body">
<div><a href="{{url('rejects/create')}}">New Entry</a></div>
<table class="table table-bordered">
<thead>
                <tr>
                    <th>Farmer.</th>
                    <th>Vehicle</th>
                    <th>Total Rejets</th>
                    <th>Price</th>
                    <th>Total</th>
</thead>
<tbody>
@foreach ($datas as $item)
<tr>
                          <td>{{ $item->farmer }}</td>
                          <td>{{ $item->vehicle_no}}</td>
                          <td>{{ $item->rejects}}</td>
                          <td>{{ $item->price }}</td>
                          <td>{{ $item->total }}</td>
                        
</tr>
@endforeach         
</tbody>

</table>
</div>
</div>
</div>
</div>
@endsection