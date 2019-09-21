@extends('layouts.app')
@extends('layouts.sidebar')
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
@section('content')
  <div class="content">
    <edit-product :edit-data="{{ json_encode($products) }}"></edit-product>
  </div>
@endsection


