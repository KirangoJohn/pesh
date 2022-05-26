@extends('layouts.master')
@section('content')
<div class="container">
<div class="card card-warning">
<div class="card-header">
<h3 class="card-title">Rejects</h3>
</div>
<div class="card-body">
            <form method="post" action="{{ route('rejects.store') }}">
            @csrf
            <div class="row">
            <div class="col-sm-6">
            <div class="form-group"> 
            <label for="farmer">Enter Supplier Name:</label>
              <input type="text" class="form-control " name="farmer" placeholder="Enter Farmers Name" required/>
                </div>
            </div>
          
        <div class="col-sm-4">
          <div class="form-group">
              <label for="vehicle_no" class="mr-sm-2">Enter Vehicle No. Plate:</label>
              <input type="text" class="form-control mb-2 mr-sm-2" name="vehicle_no" placeholder="Vehicle Reg" required/>
          </div>
</div>
<div class="col-sm-4">
          <div class="form-group">
              <label for="rejects" class="mr-sm-2">Rejects in Kgs:</label>
              <input type="text" class="form-control mb-2 mr-sm-2" name="rejects" placeholder="Rejects in Kgs" required/>
          </div>
</div>
<div class="col-sm-4">
          <div class="form-group">
              <label for="price" class="mr-sm-2">Price</label>
              <input type="text" class="form-control mb-2 mr-sm-2" name="price" placeholder="Price" required/>
          </div>
</div>

<div class="col-sm-4">
          <button type="submit" class="btn btn-primary btn btn-block btn-default btn-lg">Save</button>
</div>
      </form>
      </div>
      </div>
      </div>
      </div>
      </div>
     
 
      @endsection

      