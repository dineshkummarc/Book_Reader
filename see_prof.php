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
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<style type="text/css">
.user_book{
	margin-top: 1%;
	margin-left: 5%;
}
.book_cover{
	padding-bottom: 15px;
}
</style>

<body>
<?php
include('top_bar.php');

 if(isset($_GET['status_id'])){
 	$user_id=  $_GET['status_id'];
  $conn = mysqli_connect("localhost", "root", "", "booklibrary1"); 
  $sql = "SELECT * from user  WHERE user.id= '$user_id'";
  $result = mysqli_query($conn, $sql);
?>
<div class="profile">
<div class="user_profile">
	<?php if (mysqli_num_rows($result) != 0) { 
       while($row = mysqli_fetch_array($result)){
	 ?>
	<div class="user_image" align="center" style="margin-top: 20px;">
	<?php if (empty($row['user_image'])) { ?>
    <img style="border-radius: 100%;border: 1px solid #eeeeee"  width="100" height ="120" class= "profile_user" 
    src=".\user_profile\profile.png">
    <?php
	} 
  else{ 
      $user_pic = $row['user_image'];
  ?>
    <img style="border-radius: 100%;border: 1px solid #eeeeee"  width="100" height ="120" class= "profile_user" 
      src="./user_profile/<?php echo $user_pic;?>">
  <?php }
  ?>
  <div class="user_name" style="margin-top: 10px;">
    <i><b><?php echo $row['name']; ?></b></i>
    </div>
    </div>
    <div class="user_book">
    <h4>BOOK LIST</h4>
    <b>READ</b>
    <table>
    <tr>
     <tr>
    <?php 
     $sql1 = "SELECT * from booklist INNER JOIN user_booklist ON booklist.book_id = user_booklist.book_id  WHERE user_booklist.user_id= '$user_id'";
     $result1 = mysqli_query($conn, $sql1);
     if (mysqli_num_rows($result1) != 0) { 
       while($row1 = mysqli_fetch_array($result1)){
       	$image1 = $row1["book_cover"];
    ?>
      <?php if($row1['choice_list']=="Read") {
      ?>
      <td class="book_cover">
      <?php echo '<a href="long_description.php?id='.$row1['book_id'].'">'?>
      <img src="./booklist/images/<?php echo $image1;?>.jpg" width="80px" height="100px"></a>
      </td>
      <?php
      	}
        }} 
       echo "</tr></table>";
      ?><b>Want to Read</b>
      <?php echo "<table><tr>";
       $sql2 = "SELECT * from booklist  INNER JOIN user_booklist ON booklist.book_id = user_booklist.book_id  WHERE user_booklist.user_id= '$user_id'";
         $result2 = mysqli_query($conn, $sql2);
  
     if (mysqli_num_rows($result2) != 0) { 
       while($row2 = mysqli_fetch_array($result2)){ 
       		$image2 = $row2["book_cover"];
           if($row2['choice_list']=="Want to Read") {
          ?>
           <td class="book_cover">
           <?php echo '<a href="long_description.php?id='.$row2['book_id'].'">'?>
          <img src="./booklist/images/<?php echo $image2;?>.jpg" width="80px" height="100px"></a>
         </td>
          <?php
          } }} echo "</tr></table>";
         ?> <b>Currently Reading</b>
         <?php echo "<table><tr>";
       $sql3 = "SELECT * from booklist  INNER JOIN user_booklist ON booklist.book_id = user_booklist.book_id  WHERE user_booklist.user_id= '$user_id'";
    
         $result3 = mysqli_query($conn, $sql3);
      
     if (mysqli_num_rows($result3) != 0) { 
       while($row3 = mysqli_fetch_array($result3)){ 
       	    $image3 = $row3["book_cover"];
            if($row3['choice_list']=="Currently Reading") {

          ?>
           <td class="book_cover">
           <?php echo '<a href="long_description.php?id='.$row3['book_id'].'">'?>
          <img src="./booklist/images/<?php echo $image3;?>.jpg" width="80px" height="100px"></a>
         </td>
          <?php
          }
          ?>
           </div>
        <?php  }} echo "</tr>";   ?>
    </table>
    </div>
<?php
 }
}
}
?>
</div>
</body>
</html>