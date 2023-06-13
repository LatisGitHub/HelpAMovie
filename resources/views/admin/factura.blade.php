@extends('admin.layout')

@section('main')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Invoice </title>
  
</head>
<body>
  <div class="container mb-5">
    <div class="row">
      <div class="col-12 mb-5">
        <h1 class="text-center">Invoice</h1>
        <h3 class="text-center">Thanks to you now we have {{$pelicula->cantidad}}€</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <h5>Customer Information:</h5>
        <p>Customer Name: {{Auth::user()->name}}</p>
        <p>Email: {{Auth::user()->email}}</p>
        <p>Movie: {{$pelicula->titulo}}</p>
      </div>
      <div class="col-md-6">
        <h5>Invoice Details:</h5>
        <p>Invoice Number: {{$payment->payment_id}}</p>
        <p>Date: {{$payment->created_at->format('Y-m-d')}}</p>
        <p>Total: {{$payment->amount}}€</p>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <h5>Products:</h5>
        <table class="table">
          <thead>
            <tr>
              <th>Movie title</th>
              <th>Quantity</th>
              <th>Unit Price</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{$pelicula->titulo}}</td>
              <td>1</td>
              <td>{{$payment->amount}}</td>
              <td>{{$payment->amount}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection