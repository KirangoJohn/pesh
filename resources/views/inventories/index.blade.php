@extends('layouts.master')
@section('content')
<div class="container">
    <style>

        </style>
<form action="{{ route('inventories.index') }}" method="GET">
<div class="form-group">
<div class="row">
<div class="col-sm-8">
    <!--input type="text" name="search" placeholder="Search" class="form-control"-->
    <input type="date" name="search" class="form-control"
        placeholder="yyyy-mm-dd" value=""
        min="1997-01-01" max="2030-12-31">
</div>
<div class="col-sm-4">
    <button class="btn btn-primary" type="submit">Search</button> 
    <form action="{{ route('inventories.index') }}">
  <button class="btn btn-success" type="submit">Referesh</button>
  <button id="print" onclick="printPage()">Print</button>
</form>  
</div>
</div>
</div>

</form>
@foreach ($totals as $item1)
    <h5>Supplier Total: {{ $item1->supplier}}</h5>
    <h5>Framlil Total: {{ $item1->framlil}}</h5>
    <h5>Profit Total: {{ $item1->profit}}</h5>
        @endforeach
        <!--div><a href="{{url('inventory/inventoriesPDF')}}">Download PDF</a></div-->
        <input type="button" value="Print" onclick="printPage();"></input>
        <table class="table table-bordered">
        
        
<thead>
                <tr>
                    <th>GNR No.</th>
                    <th>Farmer</th>
                    <th>Vehicle Reg</th>
                    <th>Supplier Total</th>
                    <th>Fremril Total</th>
                    <th>Profit</th>
                    <th>Cartons</th>
                    <th>Crates</th>
                    <th>Date</th>
</thead>
<tbody>
@foreach ($inventories as $item)
<tr>
                          <td>{{ $item->gnr }}</td>
                          <td>{{ $item->farmer }}</td>
                          <td>{{ $item->vehicle_no }}</td>
                          <td>{{ $item->supplier_total}}</td>
                          <td>{{ $item->sub_total}}</td>
                          <td>{{ $item->profit }}</td>
                          <td>{{ $item->cartons }}</td>
                          <td>{{ $item->crates }}</td>
                          <td>{{ $item->created_on }}</td>
                          
                          
</tr>
@endforeach         
</tbody>

</table>
</div>
</div>
</div>
</div>
<script>
    function printPage(id) {
    var html="<html>";
    html+= document.getElementById(id).innerHTML;
    html+="</html>";
    var printWin = window.open('','','left=0,top=0,width=1,height=1,toolbar=0,scrollbars=0,status =0');
    printWin.document.write(html);
    printWin.document.close();
    printWin.focus();
    printWin.print();
    printWin.close();
}
</script>
@endsection



