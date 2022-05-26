@extends('layouts.master')
@section('content')
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1 class="m-0">Add Farmer</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Add Farmer</li>
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
            <form method="post" action="{{ route('farmers.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Enter Full Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="national_id">Enter National ID:</label>
              <input type="text" class="form-control" name="national_id"/>
          </div>
          <div class="form-group">
              <label for="name">Enter Phone:</label>
              <input type="text" class="form-control" name="phone"/>
          </div>
          
          <button type="submit" class="btn btn-primary">Add Farmer</button>
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