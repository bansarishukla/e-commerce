<html>
  <head>
    <title>Welcome</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
      {
  margin: 0px;
  padding:0px;
}
body {
  width: 100%;
  height: 100%;
}
.header {
  position: relative;
  display: flex;
  width: 100%;
  height: auto;
}
 .logo {
   display: flex;
  flex-direction: column;
  justify-content: center;
  border-right: 1px solid blue;
  margin-left: 6%;
}
.main-title {
  padding: 0 0 0 0;
  color: blue;
  font-size: 20px;
  padding: 0 0 0 0;
  margin: 0px;
}
.sub-title {
  padding: 0 10px 0 0;
  color: blue;
  font-size: 10px;
  padding: 0 0 0 0;
  text-align: right;
}
.menu {
  display: flex;
  margin-left: auto;
  text-decoration: none;
  flex-wrap: wrap;
}
.collapse-menu {
  display: none;
  justify-content: flex-end
}
.mobile-menu {
  display: none;
  background: white;
  color: blue
  ;
  width: 100%;
}
.mobile-menu a {
  display: flex;
  padding: 10px;
}
.item {
  display: flex;
  padding: 20px 20px 0 20px;
}
.active, .item:hover {
  background:#1f55af;
  color: white;
}
.content {
  display: flex;
  width: 100%;
}
    </style>
  </head>
  <body>
    <!-- menubar -->
    <div class="container-fluid">
      <div class="header">
        <div class="logo">
          <p class="main-title">overtake</p>
          <p class="sub-title">morning</p>
        </div>
        <div class="collapse-menu">
          <div class="collapse-menu-icon-container">
             <a href="javascript:void(0)"  onclick="myFunction()"> <i class="fa fa-bars" aria-hidden="true"></i></a>
          </div>
        </div>
        <div class="menu">
            <a href="#" class="item active" >Home</a>
            <a href="#" class="item">Gallery</a>
            <a href="#" class="item">Settings</a>
            <a href="#" class="item">About</a>
            <a href="#" class="item">Contact</a>
          </div>
      </div>
      <div class="mobile-menu" id="myLinks">
          <a href="#" class=" active" >Home</a>
          <a href="#" class="">Gallery</a>
          <a href="#" class="">Settings</a>
          <a href="#" class="">About</a>
          <a href="#" class="">Contact</a>
      </div>
    </div>
  </body>
</html>
