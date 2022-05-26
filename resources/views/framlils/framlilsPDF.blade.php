<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <title>Framlils Report</title>
    <style>
      table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
    padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

tr:nth-child(even) {background-color: #f2f2f2;}
      </style>
</head>
<body>
    <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
   
    <address>
    <strong>Framlils Report.</strong><br>
   Address:<br>
    Phone:<br>
    </address>
    </div>
    <p>Date Printed: {{ $date }}</p>
    @foreach ($totals as $item1)
    <strong>Supplier Total: {{ $item1->supplier}}</strong><br>
    <strong>Framlil Total: {{ $item1->framlil}}</strong>
    <!--h5>Profit Total: {{ $item1->profit}}</h5-->
        @endforeach
        <div class="row">
<div class="table-responsive">
<table>
                <tr>
                    <th>GNR No.</th>
                    <th>Farmer</th>
                    <th>Crates</th>
                    <th>Cartons</th>
                    <th>Vehicle Reg</th>
                    <!--th>Supplier Report</th-->
                    <th>Framlil Report</th>
                    <!--th>Profit</th-->
                    <th>Date</th>
                </thead>
                <tbody>
                @foreach ($inventories as $item)
                <tr>
                          <td>{{ $item->gnr }}</td>
                          <td>{{ $item->farmer }}</td>
                          <td>{{ $item->crates }}</td>
                          <td>{{ $item->cartons}}</td>
                          <td>{{ $item->vehicle_no }}</td>
                          <!--td>{{ $item->supplier}}</td-->
                          <td>{{ $item->supplier }}</td>
                          <!--td>{{ $item->profit }}</td-->
                          <td>{{ $item->created_on }}</td>
                    </tr>
                    @endforeach         
                    </tbody>

</table>
</body>
</html>