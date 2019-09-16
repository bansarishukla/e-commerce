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
    <div class="row">
      @include('../views/layouts/header.blade.php');
      <div class="col-md-3">
        <img src="{{ URL::asset($products->image) }}" class="image">
        <a class="btn buy_now"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Buy Now</a>
        {{-- <a href="#cancel-modal" class="text-blue-500 underline">Open Modal</a>
        <modal-component name="cancel-modal">
            <h1 class="font-bold text-xl mb-2">Leaving So Soon?</h1>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore.
            </p>
            <template v-slot:footer>
              <a
                href="#"
                class="bg-gray-500 py-2 px-4 rounded-lg text-white hover:bg-gray-600 mr-2"
              >
                Cancel
              </a>
              <a
                href="#confirm-cancel-modal"
                class="bg-blue-500 py-2 px-4 rounded-lg text-white hover:bg-blue-600"
              >
                Confirm Cancellation
              </a>
            </template>
          </modal-component> --}}
          {{-- <modal name="confirm-cancel-modal">
            <h1 class="font-bold text-xl mb-2">Are you sure?</h1>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore.
            </p>
            <template v-slot:footer>
              <a
                href="#"
                class="bg-gray-500 py-2 px-4 rounded-lg text-white hover:bg-gray-600 mr-2"
              >
                Cancel
              </a>
              <a
                href="#"
                class="bg-blue-500 py-2 px-4 rounded-lg text-white hover:bg-blue-600"
              >
                Yes
              </a>
            </template>
          </modal> --}}
    </div>
    <div class="content col-md-9">
      <h2>{{ $products->name }}</h2>
      <h5>{{ $products->price }} rs</h5>
    </div>
  </body>
</html>

