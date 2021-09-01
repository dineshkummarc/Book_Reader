<?php
    session_start();
    if(isset($_SESSION['name'])) $user = $_SESSION['name'];
    if(!isset($user)){
        echo"<script>window.open('signIn.php?mes=Access Denied..','_self');</script>";  
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
  margin-left: -10px;
}
.book_name{
	margin-top: -212px;margin-left: 150px;
	font-size: 22px;
	padding-bottom: 5px;
	font-weight: bold; 
}
.author{
	margin-left: 151px;
	padding-bottom: 5px;
}
.listing{
	padding: 10px;
	margin-bottom: 10px;
	margin-left: 15%;
}
.rating{
	margin-left: 151px;
	font-size: 12px;
	color: blue;
	padding-bottom: 5px;
}
.description{
	width: 70%;
	margin-left: 150px;
	text-align: justify;
	font-style: oblique;
	font-size: 15px;
}
#line{
	margin-bottom: 15px;
	width: 80%;
	margin-left: -10px;
}
.list_des{
	margin-top: -150px;
}
.review{
	margin-left: 360px;
	margin-top: 40px;
}
#comment_id{
	margin-top: 20px;
}
</style>
</head>

<body>

<?php include("top_bar.php"); 

if(isset($_GET['id'])){
	$book_id = $_GET['id'];

  $conn = mysqli_connect("localhost", "root", "", "booklibrary1"); 
  $sql = "SELECT * FROM booklist WHERE book_id='$book_id'";
  $result = mysqli_query($conn, $sql);
	?>

<div class="booklist">
<div class="list" style="margin-top: -50px;">
	<?php
   if (mysqli_num_rows($result) != 0) {
   	 echo "<div class='list'>";
         while($row = mysqli_fetch_array($result)){
         	 echo "<div class='listing'>";
         	 $image = $row["book_cover"];?>
         	  <div class="image">
             <img src="./booklist/images/<?php echo $image;?>.jpg" width="150px" height="250px">
            </div >
            <div class="list_des" style="margin-top: -265px;margin-left: 5px;">
              <div class="book_name">
             <a href='#' style="text-decoration: none;color: black;"><?php echo $row['book_name'];?></a></div>
             <div class="author">by <?php echo $row['book_author'];?></div>
             <div class="rating">Rating details.<?php echo number_format($row['book_rating']);?>ratings</div>
             <div class="description"><?php echo htmlspecialchars_decode($row['long_description']);?>
             </div>
             </div>
           </div>
        <?php     
    }
  }
}
?>
<br><br>
</div>
</div>

<div class="review">
   <div class="comment_form">
   <form method="post" action="" enctype="multipart/form-data" id="comment_form">
  <div class="form_group">
    <label class="title">Please Give a Review</label><br>            
    <textarea name="comment" cols="1" rows="5"  class="form-control"  value ="" style="width: 640px;"></textarea >
  </div>
  <div class="form_group" style="font-weight: bold;">
   <input type="submit" name="send_review" value="post" id='comment_id'>
  </div>
  </form>
  </div> 
</div>
<br><br><br>
</body>
</html>