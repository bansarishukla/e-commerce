@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <head>
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
  </head>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
@endsection
