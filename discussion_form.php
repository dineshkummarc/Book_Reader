<?php
session_start();

if(empty($_SESSION['id']) ){
    header("http://localhost/CSE480project/discussion_form.php");
    die();
}
  $user_id=$_SESSION['id'];
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
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
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
$book_nameError=$topicError=$commentError=$duplicateError="";
$book_name=$dis_topic=$comment="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (isset($_POST["send_post"])) {
     $book_name = test_input($_POST["book_name"]);
     $dis_topic = test_input($_POST["dis_topic"]);
    if(empty($_POST['comment'])){
    	  ?>  
      <script type="text/javascript">
        alert('Please fill out the comment field');
        document.getElementById('myform');
      </script>
        <?php
    }
    else{
      $comment = test_input($_POST["comment"]);
    }

  if(!empty($_POST["book_name"]) && !empty($_POST["dis_topic"]) && !empty($_POST["comment"])) { 

   $link = mysqli_connect("localhost", "root", "", "booklibrary1");  
   $dt = new DateTime('now', new DateTimezone('Asia/Dhaka')); 
   $time= $dt->format('F j, Y, g:i a');
   $book_name = mysqli_real_escape_string( $link,  $book_name);
   $dis_topic = mysqli_real_escape_string( $link,  $dis_topic );
   $comment = mysqli_real_escape_string( $link, $comment );
   $sql = "INSERT INTO discussion (`discussion_id`, `book_topic`, `book_name`,`user_id`, `comment`, `updated_at`, `created_at`) VALUES ('','$dis_topic','$book_name','$user_id','$comment','','$time')";
  if(mysqli_query($link, $sql)){
    echo "Records inserted successfully.";
     echo "<script>window.open('discussion.php','_self');</script>";
  } 
  else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
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
	<div class="form_discussion">
		<h3 style="padding-top: 15px;">Post a New Discussion </h3>
	<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" id='myform'enctype="multipart/form-data">
	<div class="form_group">
	<label class="title" style="color:  #4863A0;">Name of the book</label><br>         
  <input type="text" name="book_name" required id="input" autofocus autocomplete placeholder="book name" class="form-control"><br>
	</div>
	<div class="form_group">
	<label class="title" style="color:  #4863A0;">Topic of the discussion</label><br>          
  <input type="text" name="dis_topic" required  id="input"  class="form-control"><br>
	</div>
	<div class="form_group">
	<label class="title" style="color:  #4863A0;">Comment</label><br>  <textarea name="comment"  rows="8"  class="form-control"  value ="" style="width: 50%;"></textarea >
	</div>

	<div class="form_group" style="font-weight: bold;">
		<input type="submit" name="send_post" value="Post" id='post_id' class="btn btn-primary" style="margin-top: 20px;margin-bottom: 20px;">
	</div>
	</form>
	<a href="homePage.php" style="margin-left: 10px;font-weight: bold;">cancel</a>
</div>
</body>
</html>