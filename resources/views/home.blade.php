@extends('layouts.master')
@section('content')

<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1 class="m-0">Dashboard</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Dashboard</li>
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
<h5 class="card-title">No of Clients</h5>
<p class="card-text">

</p>

</div>
</div>
<div class="card card-primary card-outline">
<div class="card-body">
<h5 class="card-title">Current Prices</h5>
<p class="card-text">

</p>

</div>
</div>
</div>

<div class="col-lg-6">
<div class="card">
<div class="card-header">
<h5 class="m-0">Profit</h5>
</div>
<div class="card-body">
<h6 class="card-title"></h6>
<p class="card-text"></p>
<a href="#" class="btn btn-primary"></a>
</div>
</div>
<div class="card card-primary card-outline">
<div class="card-header">
<h5 class="m-0">Total Cartons Sold</h5>
</div>
<div class="card-body">
<h6 class="card-title"></h6>
<p class="card-text"></p>
<a href="#" class="btn btn-primary"></a>
</div>
</div>
</div>
 
</div>

</div>
</div>

</div>

<!--div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div-->
@endsection
