<html>
  <head>
    <title>Welcome</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
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
.grad {
  background-image: linear-gradient(to right, #1f55af, #478cd9);
  width: 100%;
  height: 35%;
}
.leftside {
  width: 55%;
  margin: 8% 0 0 6%;
  color: white;
}
.left-portion-h1 {
  /* display: flex; */
  font-size: 35px;
  font-weight: bold;
}
.left-portion-p {
  font-size: 16px;
}
.rightside {
  width: 45%;
}
.img1 {
  height: 80%;
  width: 80%;
  float: right;
  margin: 5% 0 5% 0;
}
.sub-content {
  height: auto;
}
.sub-content-h1 {
  justify-content: center;
}
.sub-content-p {
  text-align: justify;
  text-align-last: center;
}
.description {
  display: flex;
  position: relative;
  padding: 20px 20px;
  width: 100%;
}

.data-list {
  list-style: none;
  display: flex;
}

.data-item {
  display: flex;
  position: relative;
  background: #ccc;
  padding: 20px 20px;
  margin: 20px 20px;
  flex-direction: column;
  text-align: center;
}
.fa {
  font-size: 35px;
  color: gray;
  text-align: center;
  margin: 5% 0 7% 0;
}
.text_align {
  text-align: center;
  color: gray ;
}
.text_style {
  text-align: justify;
  text-align-last: center;
}
.button-align {
  align-items: center;
}
.footer {
  display: flex;
  background-color: #1f55af;
  height: 30%;
}
.img2 {
  display: flex;
  padding: 2% 2% 2% 2%;
}
.footer-p {
  display: flex;
  padding: 2% 1% 0 1%;
  color: white;
}
@media (max-width: 1135px) {
  .item {
    display: flex;
  }
  .data-list {
    flex-wrap: wrap;
    /* flex-direction: column; */
    /* border: 1px solid black;  */
  }
  .footer {
    flex-direction: column;
    height: auto;
  }
  .menu {
    display: none;
  }
  .collapse-menu {
    display: flex;
    width: 100%;
  }
}

    </style>
  </head>
  <body>
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
    </div>
  </body>
</html>
