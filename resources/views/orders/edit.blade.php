@extends('layouts.master')
@section('content')
   <div class="container">
<div class="card card-warning">
<div class="card-header">
<h3 class="card-title">Edit Orders</h3>
</div>
<div class="card-body">
<form method="post" action="" class="form-inline py-3">
        @csrf
        <label for="gnr">GNR No:</label>
        <input type="text" class="form-control" size="6"/>
        <label for="size">Size</label>
        <input type="text" class="form-control" size="6"/>
        <label for="weight">Weight</label>
        <input type="text" class="form-control" size="6"/>
        <label for="weight">Fruit</label>
        <input type="text" class="form-control" size="6"/>
        <label for="weight">Buying Price</label>
        <input type="text" class="form-control" size="6"/>
        <label for="weight">Selling Price</label>
        <input type="text" class="form-control" size="6"/>
        <label for="weight">Cartons</label>
        <input type="text" class="form-control" size="6"/>
  <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
</div>

</div>
</div>


@endsection