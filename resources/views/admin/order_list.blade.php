@extends('layouts.app')
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
@section('content')
  <div class="content">
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Cusomer Name</th>
            <th scope="col">Date</th>
            <th scope="col">Amount</th>
            {{-- <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Edit</th> --}}
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach($orders as $order)
            <tr>
              <td>{{ $order->name }}</td>
              <td>{{ $order->created_at }}</td>
              <td>0</td>
              <td><i class="fa fa-trash delete" aria-hidden="true"></i></td>
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>
@endsection
