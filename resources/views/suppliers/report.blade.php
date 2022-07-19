@extends('layouts.master')
@section('content')

<div class="container">

<form action="{{route('search')}}" method ="POST">
@csrf 
<div class="form-inline">

    <label for="date" >From</label> 
    <input type="date" class="form-control input-sm" id = "from" name = "fromDate" required/>


<label for="date"> To</label>
<input type="date" class="form-control input-sm" id="to" name="toDate" required/> 


    <button type="submit" class="btn btn-primary mb-2" name="search">Submit</button>

</div> 
</div>
</div>




@endsection
