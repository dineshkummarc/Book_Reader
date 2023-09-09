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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<style type="text/css">
.list{
	margin-left: 250px;
	padding: 8px;

}
.start_dis{
	margin-left: 100px;
	font-size: 15px;
}
.book_list{
	font-size: 18px;
	text-decoration: none;color: darkblue;

}
.book_list: hover {
    text-decoration: underline;color: blue;
     border-bottom: 3px solid blue;
}
</style>
</head>
<body>
	<?php include('top_bar.php') ?>
<div class="discuss">
	<h3 style="margin-left: 100px;margin-top: 10px;">Discussions</h3>
	<div class="start_dis">
		<a href="discussion_form.php">Start a new book discussion</a>
	</div>
    <div class="dis_list">
    	<?php
    		 $conn = mysqli_connect("localhost", "root", "", "booklibrary1"); 
 			 $sql = "SELECT * FROM discussion";
   			 $result = mysqli_query($conn, $sql);
   		 if (mysqli_num_rows($result) > 0) {
         ?>
         <div class='list'>
         <table><tr>
         <?php
         while($row = mysqli_fetch_array($result)){
         	
         	?>
         	<div class='listing' style="margin-bottom: 20px;">
           <td id="image-list"> <?php
           	echo '<a class="book_list" href="post_details.php?id='.$row['discussion_id'].'">'.$row["book_topic"]."------".$row['book_name']?>
 
            </a>

           </td></tr></div>
           
        <?php
              
    }

    echo "</tr></table>";
    echo "</div>";

  }

    	?>
    </div>
</div>
</body>
</html>