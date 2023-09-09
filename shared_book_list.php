
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

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

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
.down_btn a{
  color: white;
}
.down_btn a:hover{
text-decoration: none;color: pink;
     border-bottom: 1px solid white;

}
.down_btn{
  margin-left: 5%;
}
.dis_list{
   margin-left: 20%;
   margin-top: 3%;
}
table,th,td{
  padding-left:40px;
  text-align: center;
  padding-top: 2px;
}
th{
  margin-left: 10px;
  color: #357EC7;
}
td{
  color: #307D7E;
}
h3{
  font-style: italic;
  color: #3B9C9C;
}
</style>
</head>
<body>
	<?php include('top_bar.php') ?>

<div class="discuss">
	<h3 style="margin-left: 100px;margin-top: 30px;">Available Book PDF</h3>
	<!-- <div class="start_dis">
		<a href="discussion_form.php">Start a new book discussion</a>
	</div> -->
    <div class="dis_list">
       <table>
         <tr>
         <th>Book Name</th>
         <th>Author Name</th>
         <th>Shared By</th>
         <th>File Name</th>
         <th>PDF File</th>
       </tr>
    	<?php
    	 $conn = mysqli_connect("localhost", "root", "", "booklibrary1"); 
 			 $sql = "SELECT * FROM user_share_book LEFT JOIN user on user.id=user_share_book.user_id";
   			 $result = mysqli_query($conn, $sql);
   		 if (mysqli_num_rows($result) > 0) {
         while($row = mysqli_fetch_array($result)){
         	
         ?>
           <tr><td colspan="6"><hr></td></tr>
          <tr> 
           <td id="book-list">
            <?php echo $row['share_book_name'];?></td>
            <td><?php echo $row["book_author"]; ?></td>
            <td><?php echo $row["name"];?></td>
            <td><?php echo $row['share_file'] ?></td>
           <td><div class="down_btn">
          <button type="button" class="btn-sm btn-dark"><a href="share_pdf/<?php echo $row['share_file']?>" download>Download</a></button>
         </div>
           </td> </tr>

  <?php         
    }
  }
  ?>
</table></div>
</div>
<br><br><br>
</body>
</html>