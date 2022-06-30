@extends('layouts.master')
@section('content')
<div class="container">
<div class="card card-warning">
<div class="card-header">
<h3 class="card-title">Step 1: Enter Supplier Details</h3>
</div>
<div class="card-body">
            <form method="post" action="{{ route('cards.store') }}">
            @csrf
            <div class="row">
            <div class="col-sm-6">
            <div class="form-group"> 
            <label for="farmer">Enter Supplier Name:</label>
              <input type="text" class="form-control " name="farmer" placeholder="Enter Farmers Name" required/>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
              <label for="gnr">Enter GNR No:</label>
              <input type="text" class="form-control" name="gnr" Placeholder="GRN No" required/>
          </div>
        </div>
        <div class="col-sm-6">
                <div class="form-group">
              <label for="national_id" >ID No:</label>
              <input type="text" class="form-control" name="national_id" placeholder="National ID" required/>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
              <label for="phone" class="mr-sm-2">Phone Number:</label>
              <input type="text" class="form-control mb-2 mr-sm-2" name="phone" placeholder="Phone" required/>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
              <label for="vehicle_no" class="mr-sm-2">Enter Vehicle No. Plate:</label>
              <input type="text" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" class="form-control mb-2 mr-sm-2" name="vehicle_no" placeholder="Vehicle Reg" required/>
          </div>
</div>
<div class="col-sm-4">
          <div class="form-group">
              <label for="crates" class="mr-sm-2">Enter No. of Crates:</label>
              <input type="text" class="form-control mb-2 mr-sm-2" name="crates" placeholder="No. of Crates" required/>
          </div>
</div>
<div class="col-sm-4">
          <div class="form-group">
              <label for="created_on" class="mr-sm-2">Date:</label>
                <input type="date" class="form-control mb-2 mr-sm-2" id="birthday" name="created_on" placeholder="Date" required/>
          </div>
</div>
<div class="col-sm-4">
          <button type="submit" class="btn btn-primary btn btn-block btn-default btn-lg">Next</button>
</div>
      </form>
      </div>
      </div>
      </div>
      </div>
      </div>
     
 
      @endsection

      