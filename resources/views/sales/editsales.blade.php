@extends('layouts.master')
@section('content')
    <div class="container">
    <h1 class="m-0">Step 2: SELL POINT</h1>
    <div class="row">
        <div class="col-sm-6">
        <h3></h3>
        <div class="panel panel-primary">
            <div class="panel-heading"></div>
            <div class="panel-body">
            <form method="post" action="{{route('sales.store')}}">
                <div class="form-group">
                @csrf
                <label for="gnr">GNR No:</label>
                    <select name="gnr" class="form-control" required>
                        <option value="" selected disabled>GNR No</option>
                        @foreach ($cards1 as $key => $gnr)
                            <option value="{{ $key }}"> {{ $gnr }}</option>
                        @endforeach
                    </select>
                    <label for="size">Size:</label>
                    <select id="numb" name="size_id" class="form-control" required>
                        <option value="" selected disabled>Select Size</option>
                        @foreach ($sizes as $key => $size)
                            <option value="{{ $key }}"> {{ $size }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                 <label for="weight">Enter weight:</label>
                 <input type="text" id="weight" class="form-control" name="weight" required/>
                </div>
                <div class="form-group">
                    <label for="fruit">Select Fruit:</label>
                    <select id="fruit" name="fruit_type" class="form-control" required>
                        <option value="" selected disabled>Select Fruit</option>
                        @foreach ($fruits as $key1 => $fruit)
                            <option value="{{ $key1 }}"> {{ $fruit }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                 <label for="buying_price">Enter Buying Price:</label>
                 <input type="text" class="form-control" name="buying_price" required/>
                </div>
                <div class="form-group">
                 <label for="selling_price">Enter Selling Price:</label>
                 <input type="text" class="form-control" name="selling_price" required/>
                </div>
                <div class="form-group">
                 <label for="cartons">Enter No of Cartons:</label>
                 <input type="text" class="form-control" name="cartons" required/>
                </div>
                <div>
                 <p id="demo"></p>
                </div>

                <button type="submit" class="btn btn-primary" onclick="myFunction()">Next Sale</button>
</form>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div>
        @foreach ($cards as $item)
        <h4>Farmer Name:{{ $item->farmer }}</h4>
        <h4>Vehicle No:{{ $item->vehicle_no }}</h4>
        <h4>Date Processed: {{ $item->created_on }}</h4>
        <h4>No of Crates: {{ $item->crates }}</h4>
        <h4></h4>
        @endforeach
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
                    <!--th>Delete</th-->
                    <tr>
                      <thead>
                      <tbody>
                      @foreach ($sales as $sale)
                        <tr>
                          <td>{{ $sale->size }}</td>
                          <td>{{ $sale->weight}}</td>
                          <td>{{ $sale->buying_price}}</td>
                          <td>{{ $sale->selling_price}}</td>
                          <td>{{ $sale->cartons}}</td>
                          <td>{{ $sale->sub_total}}</td>
                          <td>{{ $sale->supplier_total}}</td>
                          <td>{{ $sale->profit}}</td>
                          <!--td>
                                <form action="{{ route('sales.destroy', $sale->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </form>
                            </td-->
                        </tr>
              @endforeach         
</tbody>

</table>
<div>@foreach ($totals as $total1)
    <h5>Supplier Total: <th>{{ $total1->Total}}</th></h5>
    @endforeach

    @foreach ($totals2 as $supplier)
    <h5>Framlil Price: <th>{{ $supplier->supplier}}</th></h5>
    @endforeach

    @foreach ($profits as $item2)
    <h5>Profit: <th>{{ $item2->profit}}</th></h5>
    @endforeach

    @foreach ($cartons as $item)
    <h5>Cartons: <th>{{ $item->Carton}}</th></h5>
    @endforeach
</div>
<form action="{{ route('orders.store')}}" method="post">
            @csrf
            <button class="btn btn-success" type="submit">Finish Transaction</button>
            </form>
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