@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
          <category-component :post-data="{{ json_encode($categories) }}"></category-component>
        </div>
      </div>
    </div>
  </body>
@endsection
<style>
  .body {
    padding: 0 0 0 0 ;
    margin: 0 0 0 0;
  }
  .main{
    display: flex;
    height: 100%;
  }
  .sidebar {
    width: 15%;
    background-color: #253238;
    padding: 80px 0 0 50px;
  }
  .sidebar a {
    color: white;
  }
  .list {
    color: white;
    list-style: none;
    padding: 0 0 20px 0;
  }
  .content {
    width: 85%;
  }
</style>
