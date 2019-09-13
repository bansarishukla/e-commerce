@extends('layouts.app')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
@section('content')
<body>
  <div class="container-fliud">
    <div class="main">
      <div class="sidebar">
        <ul>
          <li class="list"><i class="fa fa-tag" aria-hidden="true"></i><a href="/product">Add Products</a></li>
          <li class="list"><i class="fa fa-tag" aria-hidden="true"></i><a href="/product/create">Product List</a></li>
          <li class="list"><i class="fa fa-tag" aria-hidden="true"></i><a href="/category/create">Categories</a></li>
          <li class="list"><i class="fa fa-first-order" aria-hidden="true"></i>Orders</li>
        </ul>
      </div>
      <div class="content">
        <display-product :post-data="{{ json_encode($product) }}"></display-product>
      </div>
    </div>
  </div>
</body>
@endsection
<style>
  .main {
    width: 100%;
    height:100%;
    display: flex;
    flex-direction: row;
  }
  .sidebar {
    width: 15%;
    height:100%;
    background-color: #253238;
    padding: 80px 0 0 50px;
    color: white;
  }
  .sidebar a {
    color: white;
  }
  .content {
    height: 100%;
    width: 85%;
    padding: 0 0 0 0;
  }
  .list {
    list-style: none;
    padding: 10px;
  }
</style>
