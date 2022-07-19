@extends('layouts.master')
@section('content')

<div class="container">
<div>
<form action="{{ route('suppliers_report.index') }}" method="GET">
<div class="form-group">
<div class="row">
<div class="col-sm-4">
    <!--input type="text" name="search" placeholder="Search" class="form-control"-->
    <input type="date" name="search" class="form-control"
        placeholder="yyyy-mm-dd" value=""
        min="1997-01-01" max="2030-12-31">
</div>
<div class="col-sm-8">
    <button class="btn btn-primary" type="submit">Search</button> 
    <form action="{{ route('suppliers_report.index') }}">
  <button class="btn btn-success" type="submit">Referesh</button>
  <button class="btn btn-success" onclick="printDivContent()" />Print</button>
</form>  
</div>
</div>
</div>

</form>
<div id="printContent">
        <table class="table table-bordered">   
<thead>
                <tr>
                    <th>GNR No.</th>
                    <th>Farmer</th>
                    <th>Vehicle Reg</th>
                    <th>Cartons</th>
                    <th>Crates</th>
                    <th>Supplier Total</th>   
                    <th>Date</th>
</thead>
<tbody>
@foreach ($inventories as $item)
<tr>
                          <td>{{ $item->gnr }}</td>
                          <td>{{ $item->farmer }}</td>
                          <td>{{ $item->vehicle_no }}</td>
                          <td>{{ $item->cartons }}</td>
                          <td>{{ $item->crates }}</td>
                          <td>{{ $item->supplier_total}}</td>
                          <td>{{ $item->created_on }}</td>                          
</tr>
@endforeach  
@foreach ($totals as $item1)
<tr>
    <th>Totals</th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th class="row_data"> {{ $item1->supplier}}</th>
    <th></th>
</tr>
@endforeach
</tbody>

</table>
</div>
</div>
</div>
</div>
</div>
<script>
    // Get all the "row_data" elements into an array
let cells = Array.prototype.slice.call(document.querySelectorAll(".row_data"));

// Loop over the array
cells.forEach(function(cell){
  // Convert cell data to a number, call .toLocaleString()
  // on that number and put result back into the cell
  cell.textContent = (+cell.textContent).toLocaleString('en-US', { style: 'currency', currency: 'KES' });
});
</script>
<script>
function printDivContent() {
 	var divElementContents = document.getElementById("printContent").innerHTML;
 	var windows = window.open('', '', '');
 	windows.document.write('<html>');
 	windows.document.write('<table> <h1>Suppliers Report<br>');
 	windows.document.write(divElementContents);
 	windows.document.write('</table></html>');
 	windows.document.close();
 	windows.print();
}
</script>
<script>
    </script>
@endsection



