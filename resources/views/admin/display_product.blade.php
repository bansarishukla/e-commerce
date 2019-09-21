<meta name="csrf-token" content="{{ csrf_token() }}">
@extends('layouts.app')

@extends('layouts.sidebar')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
@section('content')
<body>
  <div class="container-fliud">
    <div class="main">
      <div class="content">
        <display-product :post-data="{{ json_encode($product) }}"></display-product>
      </div>
    </div>
  </div>
</body>
@endsection

