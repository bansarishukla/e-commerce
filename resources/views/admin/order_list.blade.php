<meta name="csrf-token" content="{{ csrf_token() }}">
@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <body>
    <div class="container-fliud">
      <div class="main">
        <div class="content">
          <order-display :post-data="{{ $orders }}"></order-display>
        </div>
      </div>
    </div>
  </body>
@endsection

