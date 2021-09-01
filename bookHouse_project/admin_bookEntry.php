<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<style type="text/css">
.container{
  background:white;
  width: 100%;
}
.container .book_enter{
  background:  #F492F0 ;
  margin-top:55px;
  margin-left: 340px;
  width: 40%;
}
.container .entry_form{
  text-align: center;
  padding: 10px;
}
.container .form-group .title{
    text-align: center;
    margin-left: 30px;
    padding: 30px;
    margin-top: 55px;
    font-weight: bold;
}
.container .form-group {
  padding: 15px;
}
.container .form-group .form-control{
  border-style: solid;
  border-color:  white;
  width: 30%;
  margin-left: -30px;
  float: none;
  resize: none;
  overflow: hidden; 
  padding: 5px;
}
.error{
  color: red;
}
</style>

<body>

<?php
$book_name=$book_author=$rating=$book_cover=$genre=$description=$clean= $image= $long_description="";
$nameError = $authorError = $ratingError = $coverError = $genreError = $desError =$desLongError= ""; 
 if ($_SERVER["REQUEST_METHOD"]=="POST") {
    if(empty($_POST['book_name'])){
          $nameError = "Name is required";
  }
  else{
     $book_name = test_input($_POST["book_name"]);
  } 
  if(empty($_POST['book_author'])){
          $authorError = "Author name is required";
  }
  else{
     $book_author = test_input($_POST['book_author']);
  }
  if (!empty($_FILES["image"]["name"])) { 
    $target_dir = "./booklist/images";
    $target_file = $target_dir ."/". basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
 
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
    } 
    else {
        echo "Sorry, there was an error uploading your file.";
    } 
    $image=basename( $_FILES["image"]["name"],".jpg"); 
  }
   if(empty($_POST['genre'])){
          $genreError = "Genre  is required";
  }
  else{
     $genre = test_input($_POST["genre"]);
  }
  if(empty($_POST['description'])){
          $desError = "Book description is required";
  }
  else{
     $description = test_input($_POST["description"]);
  }
   if(empty($_POST['long_description'])){
          $desLongError = "Book description is required";
  }
  else{
     $long_description = test_input($_POST["long_description"]);
  }
  $book_rating = $_POST['rating'];

if(!empty($_POST['book_name']) && !empty($_POST['book_author']) &&  !empty($_POST['genre']) && !empty($_POST['description']) && !empty($_POST['long_description'])){ 

 if(!($nameError || $authorError || $genreError || $desError || $desLongError)){
  $link = mysqli_connect("localhost", "root", "", "booklibrary1");  
  $long_description = mysqli_real_escape_string( $link, $long_description );
  $description = mysqli_real_escape_string( $link, $description );
  $sql = "INSERT INTO booklist VALUES ('','$book_name','$book_author','$book_rating', '$image','$description','','$genre','$long_description',NOW())";

  if(mysqli_query($link, $sql)){
    echo "Records inserted successfully.";
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

<div class="container">
<div class="book_enter">
<form id="book_entry" method = "post" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype=multipart/form-data>
  <h1 class="entry_form" style="margin-bottom: -15px;"><u>Book Entry Form</u></h1>
  <p><span class="error" style="margin-left: 60px;">* required field</span></p>
  <span class="error" style="margin-left: 60px;"></span>
  <div class="form-group">
  <label class="title" for="book_name">Name:</label>
  <input type="text" name="book_name" value="" class="form-control">
  <span class="error">* <?php echo $nameError;?></span>
  </div>
  <div class="form-group">
    <label class="title" for="book_author">Author Name:</label>
    <input type="text" name="book_author" value=""  class="form-control">
    <span class="error">* <?php echo $authorError;?></span>
    </div>
    <div class="form-group"> 
    <label class="title" for="genre">Book genre:</label>
    <select name="genre" id="genre" >
          <option value="select">Select genre</option>
          <option value="Fiction">Finction</option>
          <option value="Non-Fiction">Non-fiction</option>
          <option value="Romance">Romance</option>
          <option value="Poetry">Poetry</option>
          <option value="Mystery">Mystery</option>
  </select>
  <span class="error">* <?php echo $genreError;?></span>
  </div>
  <div class="form-group">
  <label class="title" for="book_rating">Book Rating:</label>
  <input type="text" name="rating" value="" class="form-control" > 
  </div>
  <div class="form-group">
    <label class="title" for="book_cover">Book Cover Image:</label>
      <input type="file" name="image"><br>  
      <span class="error">* <?php echo $coverError;?></span>
    </div>
   <div class="form-group">
      <label class="title" for="description">Book Short Description:</label>
      <div class="descript" style="width: 270%;"><br>
      <textarea name="description" cols="40" rows="8"  class="form-control"  value ="" style="margin-left: 60px;"></textarea ><span class="error">* <?php echo $desError;?></span></div>
    </div>
     <div class="form-group">
      <label class="title" for="long-description">Book Long Description:</label>
      <div class="descript" style="width: 270%;"><br>
      <textarea name="long_description" cols="40" rows="8"  class="form-control"  value ="" style="margin-left: 60px;"></textarea ><span class="error">* <?php echo $desLongError;?></span></div>
    </div>
<div class="form-group" align="center" style="font-weight: bold;">
<input type="submit" name="entry" value="Entry">
</div>
</div>
</body>
</html>