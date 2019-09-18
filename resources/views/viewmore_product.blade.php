<html>
  <head>
    <title>Dispaly Post</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <style>
      /* .main {
        display: flex;
      } */
      .card {
        width: 400px;
        height: 400px;
      }
      .image {
        height: 380px;
        width: 380px;
      }
      .buy_now {
        background-color: #fb641b;
        border: none;
        color: #fff;
        width: 150px;
        height: 40px;
        margin: 20px 0 0 110px;
      }
      .row {
        margin: 50px 0 0 70px;
      }
    </style>
  </head>
  <body>
    <div class="app">
      <div class="row">
        @include('/header');
        <div class="col-md-3">
          <img src="{{ URL::asset($products->image) }}" class="image">
          <a href="/order">Buy Now</a>
          {{-- <a href="{{action('OrderController@create')}}" class="btn buy_now"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Buy Now</a> --}}
        </div>
        <div class="content col-md-9">
          <h2>{{ $products->name }}</h2>
          <h5>{{ $products->price }} rs</h5>
        </div>
      </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

