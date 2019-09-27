<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <style>
      html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
        overflow: hidden;
      }
      .full-height {
        height: 100vh;
      }
      .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
      }
      .links > a {
        color: black;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
      }
      .m-b-md {
        margin-bottom: 30px;
      }
      .main {
        margin-top: 50px;
      }
      .content.card {
        margin: 0 50px 0 50px;
        width: 250px;
        height: 50px;
      }
      .header {
        height: 50px;
        width: 100%;
      }
      .image {
        opacity: 1;
        display: block;
        width: 100%;
        height: auto;
        transition: .5s ease;
        backface-visibility: hidden;
      }
      .buy_now {
        border: 1px solid black;
        color: black;
        text-align: center;
      }
      .buy_now:hover {
        background-color: black;
        color: white;
        font-weight: bold;
      }
      .content {
        display: flex;
      }
      .category {
        list-style: none;
        margin-top: 70px;
        margin-right:  80px;
      }
      .link:hover {
        background-color: black;
      }
      .category_style {
        color: gray;
        font-weight: bold;
      }
      .category_style:hover {
        color: white;
        text-decoration: none;
        font-weight: bold;
      }
      .product {
        margin-top: 70px;
        text-align: center;
      }
      .card {
        margin-left: 50px;
      }
      .card:hover {
        outline: gray solid 1px;
      }
      .pagination {
        margin-left: 45%;
      }
    </style>
  </head>
  <body>
    <div id="app">
      @if (Route::has('login'))
      <div class="header">
        <img src="{{URL::asset('/images/cart1.png')}}" height="40px" width="40px" class="ml-5 mt-1">
        <div class="top-right links">
          @auth
            <a href="{{ url('/home') }}">Home</a>
          @else
            <a href="{{ route('login') }}">Login</a>
            @if (Route::has('register'))
              <a href="{{ route('register') }}">Register</a>
            @endif
          @endauth
        </div>
        <hr>
      @endif
      </div>
    </div>
    {{-- main content --}}
    <div class="content">
      <div class="category">
        <h2 style="color: black;">Categories</h2>
        <hr>
          @foreach($categories as $category)
          <div class="link">
            <li><a class="category_style" href={{action('ProductController@filterByCategory', $category->id) }}>{{ $category->name }}</a></li>
            <hr>
          </div>
          @endforeach
      </div>
      {{-- <div class="container"> --}}
      <div class="row product">
        @foreach($products as $product)
          <div class="col-md-3">
            <div class="card mb-2 w-100 border-0">
              <img src="{{ URL::asset($product->image) }}" height="260px" width="100%">
              <div class="card-body">
                <h4>{{ $product->name }}</h4>
                <p>{{ $product->price }} rs</p>
                <a href="{{action('ProductController@viewMore', $product->id)}}" class="btn buy_now"><i class="fa fa-shopping-bag" aria-hidden="true"></i>View more</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
    <span class="pagination">{{$products->links()}}</span>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
