<!DOCTYPE html>
<html>
<head>
  <title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
.topnav {
  overflow: hidden;
  background-color: #F5CBA7;
}
.topnav a {
  float: left;
  color: #C70039;
  text-align: center;
  padding: 14px 30px;
  text-decoration: none;
  font-size: 20px;
}
.topnav a:hover {
  background-color:   #F08080;
  color: black;
}
.topnav a.active {
  background-color:#CCCCFF;
  color: white;
}
form.searching input[type=text] {
  padding: 5px;
  font-size: 17px;
  border: 1px solid orange;
  margin-top: 10px;
  float: left;
  width: 25%;
  background: #f1f1f1;
  margin-left: 15px;
}
form.searching button {
  float: left;
  font-size: 20px;
  border: none;
  border-left: none;
  cursor: pointer;
  margin-top: 15px;
  margin-left: -35px;
}

form.searching::after {
  border: 1px solid pink;
}
input:focus {
    outline: none !important;
    border:1px solid red;
    box-shadow: 0 0 3px #719ECE;
}
.topnav .browse {
  float: left;
  overflow: hidden;
}
.topnav .browse .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: #C70039;;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 20px;
}
.topnav a:hover, .browse:hover .dropbtn {
  background-color:  #F08080;
  color: black;
}
.topnav .browse-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 116px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
.topnav .browse-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}
.topnav .browse-content a:hover {
  background-color: #ddd;
}
.topnav .browse:hover .browse-content {
  display: block;
}
</style>
</head>

<body>
<div class="topnav">
  <a  class="home" href="homePage.php"  style="margin-left:100px;">Home</a>
  <a href="user_booklist.php">My Book</a>
   <div class="browse">
   <button class="dropbtn">Browse
   <i class="fa fa-caret-down"></i></button>
   <div class="browse-content"  >
    <a href="genre.php">Genre</a>
    <a href="discussion.php">Discussion</a>
    <a href="shared_book_list.php">Shared Book</a>
    </div></div>

<div class="profile">
  <a href="user_profile.php" style="margin-left: 40px;">
    Profile  <i class="fas fa-user-alt" style="width:20px;"></i>
  </a>
</div>
<a href="logout.php">Logout</a>
</div>
</body>
</html>