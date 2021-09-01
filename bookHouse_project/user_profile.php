<?php
 session_start();

 $user_name = $_SESSION['name'];
 $user_id = $_SESSION['id'];

 if(isset($_SESSION['name'])) $user = $_SESSION['name'];
 if(!isset($user)){
        echo"<script>window.open('signIn.php?mes=Access Denied..','_self');</script>";  
 }
?>
<!DOCTYPE html>
<html>
<head>
	<title>user_profile</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
.user_profile {

 width: 50%;
 margin-left: 23%;
 margin-top: 10px;
 padding: 10px;
}
.user_name{
	margin-top: 10px;
	font-size: 25px;

}
.update{
	padding: 20px;
}
.form_group{
	width: 50%;
	padding: 5px;

}


.title{
	margin-bottom:0px;
	margin-top: 6px;
	text-align: left;
	margin-left: 152px;
}
</style>
</head>
<body>

<?php
include('top_bar.php');
  $conn = mysqli_connect("localhost", "root", "", "booklibrary1"); 
  $sql = "SELECT * from user WHERE id= '$user_id'";
  $result = mysqli_query($conn, $sql);

?>
<div class="user_profile"  align="center">
	<?php if (mysqli_num_rows($result) != 0) { 
       while($row = mysqli_fetch_array($result)){
       	
	 ?>
	<div class="user_image">
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
	
	</div>
    <div class="user_name" style="margin-top: -10px;">
    <i><?php echo $row['name']; ?></i>
    </div>
    <div class="user_email">
    <i><?php echo $row['email']; ?></i>
    </div>
	<?php  

      $sql = "SELECT * from user WHERE id= '$user_id'";
  	  $result = mysqli_query($conn, $sql);
  	  if (mysqli_num_rows($result) != 0) { 
       while($row = mysqli_fetch_array($result)){
              $user_name = $row['name'];
              $user_email = $row['email'];
             
       }}
	?>
	<div class="update">
     <form method="post" enctype="multipart/form-data">
     <div class="name_update">
     <div class="title" style="margin-top: -10px;">
     <label>User Name</label></div>
     <input type="name" name="name" value="<?php echo $user_name ?>" class="form_group" required>
     </div>

     <div class="email_update">
      <div class="title">
     <label>User Email</label></div>
     <input type="email" name="email" value="<?php echo $user_email ?>" class="form_group" required>
     </div>

     <div class="password_update">
     <div class="change_pass">
     <div class="title">
     <label>Enter Current Password</label></div>
     <input type="password" name="pass" value="" class="form_group">
     
     </div>
     
     <div class="change_pass">
     <div class="title">
     <label>Enter New Password</label></div>
     <input type="password" name="new_pass" value="" class="form_group">

     </div>
     
     <div class="upload_profile">
     <div class="title">
     <label>Upload Profile Image</label></div>

     <input type='file' name='image' style="margin-left: -10px;" class="form_group"><br>Only png & jpg format is allowed
     </div>
     
     <div class="submit_form">
     <input type="submit" name="update" value="Update" id='post_id' class="btn btn-primary" style="margin-top: 20px;margin-bottom: 20px;">
     </div>

     </div>
     </form>
    

	</div>
      <?php  

	  } } 
     $user_name = $user_new_pass = $user_pass = $user_email = $user_image="";
     $current_pass_err=$passError="";
 	if ($_SERVER["REQUEST_METHOD"] == "POST") {

   if (isset($_POST["update"])) {
    $user_name = test_input($_POST["name"]);
    $user_email = test_input($_POST["email"]);
    $user_pass = test_input($_POST["pass"]);
    $user_new_pass = test_input($_POST["new_pass"]);
    

     $query = "SELECT * FROM user WHERE id= '$user_id'" ;   
     $resulting = mysqli_query($conn, $query);
  	  if (mysqli_num_rows($resulting) != 0) { 
       while($rows = mysqli_fetch_array($resulting)){
            
           $user_password = $rows['password'];

       if (md5($user_pass) != $user_password){
           $current_pass_err= "current password is not match";

        }
        elseif(md5($user_pass) == $user_password){
            
          if (empty($_POST['new_pass'])) {
           $passError= "Password is required";
          }
         elseif(!empty($_POST['new_pass'])){
          $user_new_pass = test_input($_POST["new_pass"]);
            if(!preg_match("/\d+/", $user_new_pass)){
          $passError="New Password should have at least a number";
         }
        if(!preg_match("/[A-Z]+/", $user_new_pass)){
         $passError = "New Password should have at least one uppercase";
        }
        if(!preg_match("/[a-z]+/", $user_new_pass)){
         $passError = "New Password should have at least one lowercase";
       }
        if((strlen($user_new_pass)>20) || (strlen($user_new_pass)<8)){
         $passError = "New Password should have at least 8-20 characters";
       }
  
      }

        }

       }}

    if (!empty($_FILES["image"]["name"])) { 
     $target_dir = "./user_profile";
    $target_file = $target_dir ."/". basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
    } 
    else {
        echo "Sorry, there was an error uploading your file.";
    }
     
    $image=basename( $_FILES["image"]["name"]); 

  }

  $sql2 =$res="";
  if(!empty($image) && !empty($user_pass) && !empty($user_new_pass) && !empty($user_email) && !empty($user_name)){
  if (!$current_pass_err && !$passError) {
 
  $sql2 = "UPDATE user SET `name`='$user_name', `email`= '$user_email' , `password`= md5('$user_new_pass'),`user_image`= '$image'  WHERE id = $user_id "; 
  $res =mysqli_query($conn, $sql2);
 }
 else{

     echo '<script type="text/javascript">'; 
           echo 'alert("Current Password Does Not Match");'; 
           echo '</script>'; 
 }
}
 elseif (empty($image) && (!empty($user_pass) && !empty($user_new_pass)) && !empty($user_email) && !empty($user_name)) {
  if (!$current_pass_err && !$passError) {
 	 $sql2 = "UPDATE user SET `name`='$user_name', `email`= '$user_email' , `password`= md5('$user_new_pass')  WHERE id = $user_id "; 
   $res =mysqli_query($conn, $sql2);
 }
 elseif($passError){
  ?>
      <script type="text/javascript"> 
        var err = "<?php echo $passError?>";
        alert(err); 
        </script>
  <?php
 }
 else{

     echo '<script type="text/javascript">'; 
           echo 'alert("Current Password Does Not Match");'; 
           echo '</script>'; 
 }
}
 elseif (!empty($image) && (empty($user_pass) && empty($user_new_pass)) && !empty($user_email) && !empty($user_name)) {
  
 	 $sql2 = "UPDATE user SET `name`='$user_name', `email`= '$user_email' , `user_image`= '$image' WHERE id = $user_id "; 
   $res =mysqli_query($conn, $sql2);
 }
 elseif(!empty($user_pass)  && empty($user_new_pass)){
       echo '<script type="text/javascript">'; 
           echo 'alert("New Password is empty");'; 
           echo '</script>';

 }
  else if(empty($image) || empty($user_pass)  || empty($user_new_pass) && !empty($user_email) && !empty($user_name)){
  $sql2 = "UPDATE user SET `name`='$user_name', `email`= '$user_email' WHERE id = $user_id "; 
   $res =mysqli_query($conn, $sql2);
   }  
  if($res){
   
    echo '<script type="text/javascript">'; 
           echo 'alert("Refresh Page to See Update");'; 
       
           echo '</script>';
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
</div>
<script type="text/javascript">
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</body>
</html>