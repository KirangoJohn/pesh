@extends('layouts.master')
@section('content')
   <div class="container">
<div class="card card-warning">
<div class="card-header">
<h3 class="card-title">Edit Orders</h3>
</div>
<div class="card-body">
<div class="row">
        <div class="col-sm-6">
<form method="POST" action="{{ route('orders.update', $orders->id ) }}" class="">
            @csrf
              @method('PATCH')
        <div class="row">
            <div class="col-sm-6">
        <label for="gnr">GNR No:</label>
        <input type="text" name="gnr" class="form-control" value="{{ $orders->gnr }}"/>
        
      
        <label for="size">Size:</label>
                    <select id="numb" name="size_id" class="form-control" required>
                        <option value="" selected disabled>Select Size</option>
                        @foreach ($sizes as $key => $size)
                            <option value="{{ $key }}"> {{ $size }}</option>
                        @endforeach
                    </select>
            
        <label for="weight">Weight</label>
        <input type="text" name="weight" class="form-control" value="{{ $orders->weight }}" />

        <label for="fruit">Select Fruit:</label>
                    <select id="fruit" name="fruit_type" class="form-control" required>
                        <option value="{{ $orders->size }}" selected disabled>Select Fruit</option>
                        @foreach ($fruits as $key1 => $fruit)
                            <option value="{{ $key1 }}"> {{ $fruit }}</option>
                        @endforeach
                    </select>

        <label for="buying_price">Buying Price</label>
        <input type="text" name="buying_price" class="form-control" value="{{ $orders->buying_price }}"/>

        <label for="selling_price">Selling Price</label>
        <input type="text" name="selling_price" class="form-control" value="{{ $orders->selling_price }}"/>

        <label for="cartons">Cartons</label>
        <input type="text" name="cartons" class="form-control" value="{{ $orders->cartons }}"/>
  <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


@endsection