<html>
  <head>
    <style>
      .image {
        height: 500px;
        width: 500px
      }
      .arrange {
        display: flex;
      }
      .buy_now {
        background-color: #fb641b;
        font-size: 20px;
        text-decoration: none;
        margin: 20px 0 0 200px;
        color: white;
        text-align: center;
        padding: 10px 20px 10px 20px;
      }
      .description {
        margin-left: 100px;
      }
      .name {
        font-size: 30px;
        color: #878787;
      }
      .price {
        font-size: 35px;
        color: black;
      }
    </style>
  </head>
  <body>
    <div class="main">
      <div class="row">
        <div class="col-sm-3 arrange">
          <img src="{{ URL::asset($products->image) }}" class="image">
          <div class="description">
            <p class="name">{{ $products->name }}</p>
            <p class="price">{{ $products->price }} rs</p>
            <p>Specification: {{ $products->full_description}}</p>
          </div>
        </div>
        <div class="div col-sm-9 arrange">
          <a href='/order/create?id={{ $products->id }}&price={{ $products->price }}' class="btn buy_now">Buy Now</a>
        </div>
      </div>
    </div>
  </body>
</html>
