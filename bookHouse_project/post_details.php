<?php
    session_start();
    // if(isset($_COOKIE['email'])) $user = $_COOKIE['email'];
    if(isset($_SESSION['name'])) $user = $_SESSION['name'];
    if(!isset($user)){
        echo"<script>window.open('signIn.php?mes=Access Denied..','_self');</script>";  
    }
?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style type="text/css">

.post_group{
  margin: 20px;
  padding-top: 25px;
}
.date{
  margin-left: 40px;
  padding-left: 340px;
  font-size: 12px;
}
.post{
  width: 50%;
  height: 40%;
  background-color: #DDF3FA;
  font-family: Arial, sans-serif;
  font-size: 15px;
  margin-left: 200px;
}
.image{
  margin-left: -90px;
  margin-top: -25px;
}
.book_name{
  font-size: 18px;
  font-family: Snell Roundhand, cursive;
  color: #052348;
}
#b_name{
  font-size: 22px;
  color: #570E54;
  font-family: Snell Roundhand, cursive;
  padding-right: 8px;
}
.user_name{
  font-size: 18px;
  font-family: Snell Roundhand, cursive;
  color: #052348;
}
.post_comment{
  margin-left: 25px;
  text-align: justify-all;
  white-space: normal;
  padding-right: 25px;
}
.comment_form{
  margin-left: 250px;
  margin-top: 20px;
}
#comment_id{
  margin-top: 20px;
  background: pink;
  font-size: 15px;
  border-color:#DDF3FA ;
}
#deleting{
  margin-left: 220px;
}

</style>

<?php include("top_bar_comment.php");

if(isset($_GET['id'])){
	$discussion_id = $_GET['id'];
  $conn = mysqli_connect("localhost", "root", "", "booklibrary1"); 
  $sql = "SELECT * FROM discussion LEFT JOIN user on user.id = discussion.user_id  WHERE discussion_id='$discussion_id'";
  $result = mysqli_query($conn, $sql);

   if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_array($result)){
        $book_names= $row['book_name'];
      ?>  
    <div class="booklist">
    <div class="list">
    <div class="post" >
    <div class="post_group"> 
    <div class="book_name"><span id='b_name'>Book Name:</span><?php echo $row['book_name'];?>
    <?php 
        if ($row['user_id'] == $_SESSION['id'] ) {
        ?>  
    <a href="delete_discuss.php?id=<?php echo $row['discussion_id']; ?>"><span class="glyphicon glyphicon-trash" id="deleting"></span></a>
    <a href="edit_discuss.php?status_id=<?php echo $row['discussion_id']; ?>"><span class="glyphicon glyphicon-edit"></span></a>
    <?php
        }
    ?>
      </div>
        <table><tr>
      <td class="user_name" ><a href="see_prof.php?status_id=<?php echo $row['id'];?>"><?php echo $row['name'];?></a></td>
        <td class="date"><?php echo $row['created_at'] ;?></td></tr>
        </table>
        </div>
         <div class="post_comment" style='word-break: break-all; white-space: normal;'><b style="color: green;">Post Topic: </b><?php echo nl2br($row['book_topic']);?></div>
         <div class="post_comment" style='word-break: break-all; white-space: normal;'><?php echo nl2br($row['comment']);?></div>
        </div>
        <?php
              
    }
    
  }

		$commentError=$duplicateError="";
		$comment="";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
   		if (isset($_POST["send_comment"])) {
    	if(empty($_POST['comment'])){
    	 	 ?>  
        <script type="text/javascript">
         alert('Please fill out the comment field');
       </script>
        <?php
   		}
    	else{
     		 $comment = ($_POST["comment"]);
   		 }
  		if(!empty($_POST["comment"])) { 
  			$user_id=$_SESSION['id'];
  			$discussion_id = $_GET['id'];
        $dt = new DateTime('now', new DateTimezone('Asia/Dhaka')); 
        $time= $dt->format('F j, Y, g:i a');
    		$comment = mysqli_real_escape_string( $conn, $comment );
 			  $sql = "INSERT INTO comment  VALUES ('','$discussion_id','$user_id','$comment','','$time')";
  		 if(mysqli_query($conn, $sql)){
    		            
 			 } 
  			else{
   				 echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
 			 }
			}
			}
		}
 include 'post_comment.php';
}
    
  ?>     
   <div class="comment_form">
  <form method="post" action="" enctype="multipart/form-data" id="comment_form">
  <div class="form_group">
    <label class="title">Comment</label><br>           
    <textarea name="comment" cols="1" rows="6"  class="form-control"  value ="" style="width: 640px;"></textarea >
  </div>
  <div class="form_group" style="font-weight: bold;">
    <input type="submit" name="send_comment" value="post" id='comment_id'>
  </div>
  </form>
  </div>    
                 
<br><br><br><br>
</div>

<script type="text/javascript">
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

