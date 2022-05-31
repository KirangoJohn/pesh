@extends('layouts.master')
@section('content')
   <div class="container">
<div class="card card-danger">
<div class="card-header">
<h3 class="card-title">Edit Sales</h3>
</div>
    <div class="row">
        <div class="col-sm-6">
        <form method="post" action="">
        @csrf
            <div class="row">
            <div class="col-sm-6">
            <label for="gnr">GNR No:</label>
            <input type="text" class="form-control" name="gnr" required/>
            </div>
           
            <div class="col-sm-6">
            <label for="size">Size:</label>
            <input type="text" class="form-control" name="size" required/>
          
        </div>
    
                <div class="col-sm-6">
                 <label for="weight">Enter weight:</label>
                 <input type="text" class="form-control" name="weight" required/>
                </div>
        
                <div class="col-sm-6">
                    <label for="fruit">Select Fruit:</label>
                    <input type="text" class="form-control" name="weight" required/>
                </div>
                <div class="col-sm-6">
                 <label for="buying_price">Enter Buying Price:</label>
                 <input type="text" class="form-control" name="buying_price" required/>
                </div>
                <div class="col-sm-6">
                 <label for="selling_price">Enter Selling Price:</label>
                 <input type="text" class="form-control" name="selling_price" required/>
                </div>

                <div class="col-sm-12">
                 <label for="cartons">Enter No of Cartons:</label>
                 <input type="text" class="form-control" name="cartons" required/>
                </div>

        <div class="col-sm-4 d-grid gap-2">
                <button type="submit" class="btn btn-primary btn btn-block btn-default btn-lg">Next</button>
        </div>
      </form>
</div>
</div>
            
   
    <div class="col-sm-6">
        <div>
       
        </div>
  <div class="table-responsive">
        <table id="table" class="table">
            <thead>
                <tr>
                    <th>Size</th>
                    <th>Weight</th>
                    <th>Buying Price</th>
                    <th>Selling Price</th>
                    <th>Cartons</th>
                    <th>Buying Sub Total</th>
                    <th>Supplier Sub Total</th>
                    <th>Profit</th>
                    <th>Action</th>
                    <!--th>Delete</th-->
                    <tr>
                      <thead>
                      <tbody>
                      
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td>
                                <form >
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </form>
                            </td>
                        </tr>
                    
</tbody>

</table>
<div>
    <h5>Supplier Total: <th></th></h5>
    
    <h5>Framlil Price: <th></th></h5>

    <h5>Profit: <th></th></h5>

    <h5>Cartons: <th></th></h5>

</div>
<form action="#" method="post">
            @csrf
            <button class="btn btn-success" type="submit">Finish Editing</button>
            </form>
</div>
    </div>
</div>
</div>
    </div>
    </div>
    

    <script>
        
        // when size dropdown changes
        $('#size').change(function() {

            var sizeID = $(this).val();

            if (sizeID) {

                $.ajax({
                    type: "GET",
                    url: "{{ url('getWeight') }}?size_id=" + sizeID,
                    success: function(res) {

                        if (res) {

                            $("#weight").empty();
                            $("#weight").append('<option>Select Weight</option>');
                            $.each(res, function(key, value) {
                                $("#weight").append('<option value="' + key + '">' + value +
                                    '</option>');
                            });

                        } else {

                            $("#weight").empty();
                        }
                    }
                });
            } else {

                $("#weight").empty();
              // $("#city").empty();
            }
        });

        //when you select fruit type
        $('#fruit').change(function() {

        var fruitID = $(this).val();

        if (fruitID) {

    $.ajax({
        type: "GET",
        url: "{{ url('getPrice') }}?fruit_id=" + fruitID,
        success: function(res1) {

            if (res1) {

                $("#price").empty();
                $("#price").append('<option>Select Price</option>');
                $.each(res1, function(key1, value1) {
                    $("#price").append('<option value="' + key1 + '">' + value1 +
                        '</option>');
                });

            } else {

                $("#price").empty();
            }
        }
    });
} else {

    $("#price").empty();
 
}
});

function myFunction() {
  var x, text;

  // Get the value of input field with id="numb"

  x = document.getElementById("numb").value;

  // If x is Not a Number or less than one or greater than 10, output "input is not valid"
  // If x is a number between 1 and 10, output "Input OK"
   
  if ( x > 24) {
    text = "Input not valid";
  } else {
    text = "Input OK";
  }
  document.getElementById("demo").innerHTML = text;
}

    </script>
@endsection