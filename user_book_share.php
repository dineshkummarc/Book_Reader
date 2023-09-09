<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<link rel="stylesheet" href="user_add_file.css">

</head>
<style type="text/css">
.user_add_file{
   margin-left: 30px;
   margin-top: 30px;
   padding-bottom: 10px;

}
#return_home{
  margin-left: 420px;
  margin-top: -10px;

}
a{
  color: white;

}
.heading{
  font-size: 25px;
  margin-left: -10px;
}
.body{
  margin-left: 5%;
   margin-top: -50px;
   width: 840px;
/*   margin-right: 20px;*/
}
.share_div{
  width: 70%;
 border: 5px solid #FFFF00;
display: flex;
height: 480px;
align-items: center;
 /* text-align: center;*/
  border-width: 2px;
  border-color: green;
  margin-left: 15%;
  margin-top: 15px;
  background-color: white;
  }
.border_div{
background-color: #54C571;
 
border: 5px solid #FFFF00;
display: flex;
height: 580px;
align-items: center;
border-width: 2px;
border-color: green;
margin-left: 18%;
margin-top: 40px;
margin-right: 40px;

}
.entry_button{
  background-color: #4C787E;
  color: white;
  border-color: #008080;

}

</style>
<body>

<?php
session_start();
$user_id=$_SESSION['id'];
// include 'top_bar.php';
 if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $sbook_name = $_POST["sbook_name"];
    $author_name = $_POST["author_name"];
    $name= $_FILES['image']['name'];

    $tmp_name= $_FILES['image']['tmp_name'];

    $submitbutton= $_POST['entry'];

    $position= strpos($name, "."); 

    $fileextension= substr($name, $position + 1);

    $fileextension= strtolower($fileextension);


   if (isset($name)) {

      $path= 'share_pdf/';

     if (!empty($name)){
       if (move_uploaded_file($tmp_name, $path.$name)) {
       // echo 'Uploaded!';

      }
    }
}

  $link = mysqli_connect("localhost", "root", "", "booklibrary1");  
  
   $sql = "INSERT INTO user_share_book (`book_share_id`, `user_id`, `share_book_name`, `book_author`, `share_file`, `size`)  VALUES ('','$user_id','$sbook_name','$author_name','$name','')";
    if(mysqli_query($link, $sql)){
      echo "<script>window.open('shared_book_list.php','_self');</script>";
  } 
 
  else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
  }
   

}

?>
<div class="border_div" style="width: 70%;margin-left: 15%;">
  <div class="share_div" style="width: 95%;height:92% ;margin-left: 25px;margin-top: -1px;">
 
<div class="body">
  <div class="user_add_file">
<!--  <div class="container-fluid"> -->
<b class="heading">Share a book file</b>
 <button type="button" class="btn btn-info" id="return_home" ><a href="user_booklist.php" style="text-decoration: none;">Return to My BookList</a></button><!-- </h3> -->
</div>
<form id="book_entry" method = "post" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype=multipart/form-data>
<div class="container-fluid">
 <table class="table table-striped">
 <tr><td>
 <p>Book Name<p>
</td></tr>
<tr>
<td><input type="text" class="sbook_name" name="sbook_name" placeholder="book name" required></td>
</tr>      
<tr><td>
<p>Book Author </p>
</td>
</tr>
<tr>
<td><input type="text" class="aname" name="author_name" placeholder="book author name" required>
</td>
 </tr>
<tr><td>
<p>Pdf file</p>
</td></tr>
<tr><td><input type="file" name='image' accept="application/pdf" required pattern="^.*\.(pdf|PDF)$" class="choose_files"></td>
 </table>
<div class="footer">
<input type="submit" name="entry" value="Entry the Book" style="margin-left: 10px;" class="entry_button">
</div>
</div>
</form>
</div></div></div>
<!-- </div> -->
<!-- -->
<script type="text/javascript">
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>


</body>
</html>