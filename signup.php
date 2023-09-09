<!DOCTYPE html>
<html>
<head>
<title>sign Up</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<style type="text/css">
body {
  background-image: url('homepage.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%;
}
.sign_up_form{
  height: 100%;
  width: 45%;
  margin-left: 320px;
  background-color: white;
}
.container h2{
  font-family: Cursive, sans-serif ;
  font-style: italic;
  color: #F08080;
}
.form{
  background:  white;
  margin-top:55px;
  margin-left: 35px;
  width: 40%;
  height: 100%;
}

.form .form-control{
  margin-left: 15px;
  width: 400px;
}
.error{
  color: black;
   padding:2px;
}
.errormsg{
   margin-top: 10px;
   margin-bottom: -23px;
   width: 200%;
   margin-left: 15px;
   text-align: center;
   background-color: #9FE2BF;
   opacity: 0.7;
}
.title{
  margin-top: 10px;
  padding: 1px;
  margin-left: 20px;
  color: #4863A0;
  font-weight: bold;
  font-style: italic;
}
</style>
</head>

<body>
<?php
$nameError=$emailError=$passError= $clean=$duplicateError="";
$name=$email=$pass="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   if (isset($_POST["save"])) {

    $name = $_POST["name"];
        if(empty($name)){
              $nameError = "Name is required";
  }
  else{
     $name = test_input($_POST["name"]);
     $lastReg = "/([a-zA-Z]+)([\s]*)$/";
     $nameReg = '/^([a-zA-Z]+)([\s]+)(([a-zA-Z]*[\s]+)?)([a-zA-Z]+)([\s]*)$/i';
     
     if(!preg_match($nameReg,$name)){
         $nameError = "Username must have  last name";
      
      }
        $Name = preg_replace('/\s+/', '', $name);
      if(strlen($Name)>25 || strlen($Name)<4){
         $nameError = "Username must be 4-25 characters long";
      }
      else{
        if(preg_match($nameReg,$name)){
          $name = preg_replace('/\s\s+/', ' ', $name);
        }
      }
  }

  if(empty($_POST['email'])){
      $emailError= "Email is required";
  }
 else{
    $email=test_input($_POST["email"]);
    $emailReg ='/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
     if(!preg_match($emailReg, $email)){
          $emailError= "Invalid Email Address";
     } 
}
  if(empty($_POST['password'])){
       $passError= "Password is required";
  }
  else{
    $pass= test_input($_POST["password"]);
    if(!preg_match("/\d+/", $pass)){
        $passError="Password should have at least a number";
    }
    if(!preg_match("/[A-Z]+/", $pass)){
         $passError = "Password should have at least one uppercase";
    }
     if(!preg_match("/[a-z]+/", $pass)){
         $passError = "Password should have at least one lowercase";
    }
     if((strlen($pass)>20) || (strlen($pass)<8)){
         $passError = "Password should have at least 8-20 characters";
    }
  
 }
  
  if(!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["password"])) { 
    if(!($nameError || $emailError || $passError )){
  $link = mysqli_connect("localhost", "root", "", "booklibrary1");  

  $sql = "INSERT INTO user VALUES ('','$name','$email',md5('$pass'),NOW(),'')";


  $result = mysqli_query($link, "SELECT * FROM user");
  
  if(mysqli_query($link, $sql)){
        echo '<script type="text/javascript">'; 
        echo 'alert(" record updated successfully");'; 
        echo 'window.location.href = "signIn.php";';
        echo '</script>';
  } 
  else{
    ?> <script type="text/javascript">
      alert("This email address is already exist");
      </script>
    <?php
   }
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

<div id="errorMsg"></div>
<div class="container">
<div class="title">
<h2 style="font-size:5vw;text-align: center;">Book share house</h2>	
</div>
<div class="sign_up_form">
<div class='form' style="border-width: 1px;border-color: pink;">

<form id="registration" action = "<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" >

	<div class="form-group">
  <label class="title" for="name">Name</label>
  <input type="text" id= "username" name="name" value="<?php echo $name;?>" class="form-control">
  <div class="errormsg">
  <?php  if ($nameError) {?>
  <span class="error">*<?php echo $nameError;?></span><?php } ?></div>
  </div>
  <div class="form-group" >
  <label class="title" for="email">Email</label>
  <input type="email" id='userEmail' name="email" value="<?php echo $email;?>" class="form-control" >
      <div class="errormsg">
      <?php  if ($emailError) {?>
      <span class="error">* <?php echo $emailError;?></span><?php } ?></div>
     </div>

     <div class="form-group" >
     <label class="title" for="password">Password</label>
   	 <input type="password" name="password"  class="form-control">
     <div class="errormsg">
     <?php  if ($passError) {?>
     <span class="error">* <?php echo $passError;?></span><?php } ?></div>
     </div>
     <div class="form-group" align="center" style="font-weight: bold;margin-top: 40px;margin-left: -80px;">
     <input type="submit" name='save' value="SignUp" class="btn btn-primary">
    </div>
</form>

<div class="switch_Form" style="width: 500px;margin-left:-16px;">
<a id="switchForm" href="signIn.php">
  <p style="text-align: center;padding:8px;padding-bottom: 15px;">Already member? login now!</p></a></div></div>
</div>
</div>

<script type="text/javascript">
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

</body>
</html>