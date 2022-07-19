@extends('layouts.master')
@section('content')

<div class="container">

<form action="{{ route('suppliers.index') }}" method ="POST">
@csrf
<div class="form-inline">

    <label for="date" >From</label> 
    <input type="date" class="form-control input-sm" id = "from" name = "fromDate" required/>


<label for="date"> To</label>
<input type="date" class="form-control input-sm" id="to" name="toDate" required/> 


    <button type="submit" class="btn btn-primary mb-2" name="search">Search</button>

</div> 

</form>
<br>
<table class="table table-striped table-light">
    <tr>
        <th>Name</th>
        <th>crates</th>
        <th>Totals</th>
    </tr>
    @foreach ($supp as $item)
    <tr>
        <td>{{ $item->gnr }}</td>
        <td>{{ $item->farmer }}</td>
        <td>{{ $item->crates }}</td>
    </tr>
    @endforeach
</table>
</div>
</div>



@endsection
