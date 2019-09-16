<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Laravel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
      html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
      }
      .full-height {
        height: 100vh;
      }
      .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
      }
      .position-ref {
        position: relative;
      }
      .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
      }
      .content {
        text-align: center;
      }
      .title {
        font-size: 84px;
      }
      .links > a {
        color: white;
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
      .post {
        display: flex;
        padding: 0 50px 0 50px;
        margin: 0 50px 0 50px;
      }
      .card {
        margin: 0 50px 0 50px;
      }
      .header {
        height: 50px;
        width: 100%;
        background-color: #636b6f;
      }
      .image {
        opacity: 1;
        display: block;
        width: 100%;
        height: auto;
        transition: .5s ease;
        backface-visibility: hidden;
      }
      .middle {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
      }
      .content:hover .image {
        opacity: 0.3;
      }
      .content:hover .middle {
        opacity: 1;
      }
      .text {
        background-color: #4CAF50;
        color: white;
        font-size: 16px;
        padding: 16px 32px;
      }
    </style>
  </head>
  <body>
    <div>
      @if (Route::has('login'))
      <div class="header">
      <div class="top-right links">
        <a href="#"><i class="fa fa-paint-brush" aria-hidden="true"></i>By Styles</a>
        <a href="#"><i class="fa fa-briefcase" aria-hidden="true"></i>By Features</a>
        <a href="#"><i class="fa fa-paperclip" aria-hidden="true"></i>
          <select name="dropdown">
            @foreach($categories as $category)
            <option value="{{ $category->name }}">{{ $category->name }}</option>
            @endforeach
          </select>
        </a>
        @auth
          <a href="{{ url('/home') }}">Home</a>
        @else
          <a href="{{ route('login') }}">Login</a>

          @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
          @endif
        @endauth
      </div>
    @endif
  </div>
    <div id="app" class="main">
      {{-- <img src="{{URL::asset('/images/women-shopping.jpg')}}" alt="profile Pic" height="500px" width="100%"> --}}

        <div id="carousel-example-multi" class="carousel slide carousel-multi-item" data-ride="carousel">
        <div class="controls-top">
          <a class="btn-floating" href="#carousel-example-multi" data-slide="prev"><i
              class="fas fa-chevron-left"></i></a>
          <a class="btn-floating" href="#carousel-example-multi" data-slide="next"><i
              class="fas fa-chevron-right"></i></a>
        </div>
        <!--/.Controls-->

        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-multi" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-multi" data-slide-to="1"></li>
          <li data-target="#carousel-example-multi" data-slide-to="2"></li>
          <li data-target="#carousel-example-multi" data-slide-to="3"></li>
          <li data-target="#carousel-example-multi" data-slide-to="4"></li>
          <li data-target="#carousel-example-multi" data-slide-to="5"></li>
        </ol>
        <!--/.Indicators-->

        <div class="carousel-inner v-2" role="listbox">

          <div class="carousel-item active">
            <div class="col-12 col-md-4">
              <div class="card mb-2">
                <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/img (36).jpg" alt="Card image cap">
                <div class="card-body">
                  <h4 class="card-title font-weight-bold">Card title</h4>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                  <a class="btn btn-primary btn-md btn-rounded">Button</a>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="col-12 col-md-4">
              <div class="card mb-2">
                <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/img (34).jpg"
                  alt="Card image cap">
                <div class="card-body">
                  <h4 class="card-title font-weight-bold">Card title</h4>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                  <a class="btn btn-primary btn-md btn-rounded">Button</a>
                </div>
              </div>
            </div>
          </div>
            <div class="carousel-item">
              <div class="col-12 col-md-4">
                <div class="card mb-2">
                  <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/img (38).jpg"
                    alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title font-weight-bold">Card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                      card's content.</p>
                    <a class="btn btn-primary btn-md btn-rounded">Button</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="col-12 col-md-4">
                <div class="card mb-2">
                  <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/img (29).jpg"
                    alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title font-weight-bold">Card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                      card's content.</p>
                    <a class="btn btn-primary btn-md btn-rounded">Button</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="col-12 col-md-4">
                <div class="card mb-2">
                  <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/img (30).jpg"
                    alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title font-weight-bold">Card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                      card's content.</p>
                    <a class="btn btn-primary btn-md btn-rounded">Button</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="col-12 col-md-4">
                <div class="card mb-2">
                  <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/img (27).jpg"
                    alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title font-weight-bold">Card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                      card's content.</p>
                    <a class="btn btn-primary btn-md btn-rounded">Button</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="content">
          <div class="post">
            <div class="row">
              @foreach($products as $product)
              <div class="col">
                <div class="card">
                  <img src="{{ URL::asset($product->image) }}"  class="image" height="300px" width="300px">
                  <div class="middle">
                    <a href="{{action('ProductController@viewMore', $product->id )}}" class="btn btn-primary">View more</a>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
