<?php
    session_start();
    if(isset($_COOKIE['email'])) $user = $_COOKIE['email'];
    if(isset($_SESSION['name'])) $user = $_SESSION['name'];
    if(!isset($user)){
        echo"<script>window.open('signIn.php?mes=Access Denied..','_self');</script>";  
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<style type="text/css">
.booklist {
    margin-top: 100px;
}
#author{
    margin-left: 20px;
}
.image{
    margin-top: -10px;
    margin-bottom: 15px;
}
.book_name{
    margin-top: -140px;margin-left: 90px;
    font-size: 22px;
    padding-bottom: 5px;
    font-weight: bold;
}
.author{
    margin-left: 89px;
    padding-bottom: 5px;
}
.listing{
    padding: 10px;
    margin-bottom: 10px;
    margin-left: 15%;
}
.rating{
    margin-left: 89px;
    font-size: 12px;
    color: blue;
    padding-bottom: 5px;
}
.description{
    width: 70%;
    margin-left: 90px;
    text-align: justify;
    font-style: oblique;
    font-size: 15px;
}
#line{
    margin-bottom: 15px;
    width: 80%;
    margin-left: -10px;
}
#pages {
    width: 500px;
    border-top: 1px solid #E4E4E4;
    margin-left: 30%;
    font-size: 20px;
}

#pages img {
    display: block;
    margin: auto;
    padding-top: 30px;
}
#numbers {
    margin-top: 3px;
    margin-left: 50%;
}
#pages a {
    display: inline-block;
    text-decoration: none;
    color: #4285F4;
    margin-right: 8.5px; 
    padding-bottom: 10px;
}
#pages a:first-child {
    color: black;
}
#pages a:hover {
    text-decoration: underline;
}
.cart{
    margin-top: 10px;
    padding-bottom: 15px;
    margin-left: -10px;
}
.status{
  width: 120px;
  background-color:#B4CFEC;
  color: black;
  border-color:#95B9C7; 
  font-size: 12px;
}
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
  <a class="home" href="homePage.php" style="margin-left:100px;">Home</a>
  <a href="user_booklist.php">My Book</a>
   <div class="browse">
   <button class="dropbtn">Browse
    <i class="fa fa-caret-down"></i></button>
   <div class="browse-content"  >
      <a href="genre.php">Genre</a>
      <a href="discussion.php">Discussion</a>
      <a href="shared_book_list.php">Shared Book</a>
    </div></div>
  
<form class="searching" action="search_result.php" method="POST">
<input type="text" id="search" name="Search_Book" placeholder="search book by name or author" style="border: 1px solid pink;">
 <button type="submit" name="submit"><i class="fa fa-search"></i></button>
 <div class="profile">
  <a href="user_profile.php" style="margin-left: 40px;">
    Profile  <i class="fas fa-user-alt" style="width:20px;"></i>
  </a>
</div>
 <a href="logout.php">Logout</a>
</div>
</div>

<?php
  $conn = mysqli_connect("localhost", "root", "", "booklibrary1"); 
  $search_value=$_POST["Search_Book"];
  $sql = "SELECT  * FROM booklist WHERE book_name like '%$search_value%' OR book_author like '%$search_value%'ORDER BY (book_rating) desc ";
  $result = mysqli_query($conn, $sql);
?>
<div class="booklist">
<div class="list" style="margin-top: -50px;">
<h3 style="margin-left: 200px;margin-bottom: -8px;">Search Result</h3>
<?php
   if (mysqli_num_rows($result) > 0 ) {
     echo "<div class='list'>";
      while($row = mysqli_fetch_array($result)){
         echo "<div class='listing'>";
         $image = $row["book_cover"];?>
            <hr id='line'>
            <div class="image">
            <img src="./booklist/images/<?php echo $image;?>.jpg" width="80px" height="120px"> 
            </div>
            <div class="book_name">
             <a href='#' style="text-decoration: none;color: black;"><?php echo $row['book_name'];?></a></div>
             <div class="author">by <?php echo $row['book_author'];?></div>
             <div class="rating">Rating details.<?php echo number_format($row['book_rating']);?>ratings

            <div id="autosavenotify"></div>
            <table width="200px">
            <tr>

         <?php $book_id = $row["book_id"];  ?>
          <td class="myid"></td>   
          <td ><select class="status" id="status_<?php echo $book_id;?>" onchange="selectStatus(this)") bookname="<?php echo $row["book_name"];?>" userid="<?php echo $_SESSION['id'];?>" book_id="<?php echo $book_id;?>">
          <option value='select'>Select</option>
          <option value='Read'>Read</option>
          <option value='Want to Read'>Want to Read</option>
          <option value='Currently Reading'>Currently Reading</option>
          </select></td>
         </tr>
         </table>
         </div>
          <div class="description"><?php echo htmlspecialchars_decode($row['description']);?>
             <?php
          echo '<a href="long_description.php?id='.$row['book_id'].'"><b>more..</b></a>';
          ?>
           </div>
           </div>
        <?php     
    } ?>
    </div>
    <?php
  }
?>

<script type="text/javascript">
function selectStatus(e) {
       var book_name = $(e).attr('bookname');
       var decision = $("#"+e.id).children("option:selected").val();
       var user_id = $(e).attr('userid');
       var book_id = $(e).attr('book_id');
        $.ajax({
                 type: "POST",
                 url: "save.php",
                 data: {decision: decision, book_name: book_name ,user_id:user_id, book_id:book_id},
                 success: function(msg) {
                    alert("successfully updated as " + decision);
                 }
      })
}
</script>

<br><br>
</div>
</div>
</body>
</html>
