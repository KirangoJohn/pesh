@extends('layouts.master')
@section('content')
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1 class="m-0">Add Weights</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Weights</li>
</ol>
</div>
</div>
</div>
</div>


<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-lg-6">
<div class="card">
<div class="card-body">
<h5 class="card-title">
            <form method="post" action="{{ route('weights.store') }}">
            <div class="form-group">
            @csrf
            <label for="size_id">Select Size:</label>
                    <select id="size_id" name="size_id" class="form-control">
                        <option value="" selected disabled>Select size</option>
                        @foreach ($sizes as $key => $size)
                            <option value="{{ $key }}"> {{ $size}}</option>
                        @endforeach
                    </select>
                </div>
          <div class="form-group">
              
              <label for="weight">Enter Weight:</label>
              <input type="text" class="form-control" name="weight"/>
          </div>
          
          <button type="submit" class="btn btn-primary">Add Weight</button>
      </form>
      </h5>
<p class="card-text">

</p>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
      @endsection