<html>
  <head>
    <title>Dispaly Post</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <style>
      .card {
        width: 400px;
        height: 400px;
      }
      .buy_now {
        background-color: #fb641b;
        /* box-shadow: 0 1px 2px 0 rgba(0,0,0,.2); */
        border: none;
        color: #fff;
        width: 150px;
        height: 40px;
        margin: 20px 0 0 150px;
      }
    </style>
  </head>
  <body>
    <div class="card">
      <img src="{{ URL::asset($products->image) }}" class="image" height="400px" width="400px">
    </div>
    <button type="button" class="buy_now"><img src="{{URL::asset('/public/icons/1.jpeg')}}" alt="profile Pic" height="40px" width="40px"> Buy Now</button>

  </body>
</html>
