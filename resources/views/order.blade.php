@extends('layouts.app')
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
@section('content')
  <div class="content">
    <order-product></order-product>
  </div>
  <script src="{{ asset('js/app.js') }}"></script>
@endsection



