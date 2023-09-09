<?php
session_start();
if(!isset($_SESSION["id"])){
    echo"<script>window.open('signIn.php?mes=Access Denied..','_self');</script>";
}
$var = $_GET['status_id'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Discussion</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<style type="text/css">
.form_discussion{
	margin-left: 100px;
}
#input{
	width: 20%;
}
</style>
</head>

<body>
<div>
	<?php 
	$user_id=$_SESSION['id'];
  $link = mysqli_connect("localhost", "root", "", "booklibrary1"); 
  $query = "SELECT * FROM discussion WHERE discussion_id = $var AND user_id = $user_id";
  $result1 = $link->query($query);
  if ( $result1->num_rows > 0) {
    while($row = $result1->fetch_assoc()){
      $sql1=  "SELECT * FROM discussion WHERE discussion_id = $var AND user_id = $user_id";
       $result1 = $link->query($sql1);
     if ($result1->num_rows > 0 ) {
      while($row = $result1->fetch_assoc()){
          $name_book =  $row['book_name'];
          $topic_book = $row['book_topic'];
          $dis_comment = $row['comment'];
    }}
?>
	<div class="form_discussion">
	<h3 style="padding-top: 15px;">Update your Discussion </h3>
	<form role="form" method="post" id='myform'>
	<div class="form_group">
	<label class="title" style="color:  #4863A0;">Name of the book</label><br>            
  <input type="text" required id="input" autofocus autocomplete value="<?php echo  $name_book; ?>" name="book_names"  class="form-control"><br>
	</div>
	<div class="form_group">
		<label class="title" style="color:  #4863A0;">Topic of the discussion</label><br>         
  <input type="text"value="<?php  echo $topic_book; ?>"  name="dis_topics"  required  id="input"  class="form-control"><br>
	</div>
	<div class="form_group">
		<label class="title" style="color:  #4863A0;">Comment</label><br><textarea  rows="8"  class="form-control"  style="width: 50%;"  name="comments"><?php  echo $dis_comment; ?></textarea >
	</div>
	<div class="form_group" style="font-weight: bold;">
	<input type="submit" name="send_post" value="Post" id='post_id' class="btn btn-primary" style="margin-top: 20px;margin-bottom: 20px;">
	</div>
	<a href="discussion.php" style="margin-left: 10px;font-weight: bold;">cancel</a>
<?php
}}

$book_nameError=$topicError=$commentError=$duplicateError="";
$book_name1=$dis_topic1=$comment1="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (isset($_POST["send_post"])) {
     $book_name1 = test_input($_POST["book_names"]);
     $dis_topic1 = test_input($_POST["dis_topics"]);
     $comment1 = $_POST["comments"];
    if(empty($_POST['comments'])){
    ?> 
    <script type="text/javascript">
       alert('Please fill out the comment field');
        document.getElementById('myform');
    </script>
 
    <?php }
    else{
      $comment = test_input($_POST["comments"]);
    }

  if(!empty($_POST["book_names"]) && !empty($_POST["dis_topics"]) && !empty($_POST["comments"])) { 
    $dt = new DateTime('now', new DateTimezone('Asia/Dhaka')); 
    $time= $dt->format('F j, Y, g:i a');
    $comment1 = mysqli_real_escape_string( $link, $comment1 );
    $dis_topic1 = mysqli_real_escape_string( $link,  $dis_topic1 );
             
    $sql2 = "UPDATE discussion SET `book_topic`='$dis_topic1', `book_name`= '$book_name1' , `comment`='$comment1',`updated_at`= '$time'  WHERE discussion_id = '$var' AND user_id = $user_id"; 
  if(mysqli_query($link, $sql2)){
    echo '<script type="text/javascript">'; 
       echo 'alert("Records Update successfully");'; 
       echo 'window.location.href = "discussion.php";';
       echo '</script>';
  } 
  else{
     echo '<script type="text/javascript">'; 
           echo 'alert("update failed");'; 
           echo 'window.location.href = "edit_discuss.php";';
           echo '</script>';

  }
}
}
} 
function test_input($data){
  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);
  return $data;
}
?>
</form></div>
</body>
</html>








    
 

