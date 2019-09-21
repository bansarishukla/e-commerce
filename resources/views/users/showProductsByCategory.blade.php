<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@extends('layouts.app')

@section('content')
  <body>
    <div class="container-fluid">
      <div class="row">
        @if(count($products) > 0)
          @foreach($products as $product)
            <div class="col-md-3">
              <div class="card mb-2">
                <img src="{{ URL::asset($product->image) }}" height="250px" width="100%">
                <div class="card-body">
                  <h4>{{ $product->name }}</h4>
                  <p>{{ $product->price }} rs</p>
                  <a class="btn buy_now" href="{{action('ProductController@viewMore', $product->id)}}"><i class="fa fa-shopping-bag" aria-hidden="true"></i>View more</a>
                </div>
              </div>
            </div>
          @endforeach
        @else
          <div class="container text-center">
            <img src="{{URL::asset('/images/cart.jpg')}}" class="img-fluid" alt="2 slide">
          </div>
        @endif
      </div>
    </div>
  </body>
@endsection
<style>
  .card {
    height: 300px;
    width: 300px;
  }
  .buy_now {
    border: 1px solid black;
    color: black;
  }
  .buy_now:hover {
    background-color: black;
    color: white;
    font-weight: bold;
  }
</style>
