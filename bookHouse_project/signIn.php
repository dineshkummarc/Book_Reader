<!DOCTYPE html>
<html>
<head>
<title>Sign In</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<style type="text/css">
body {
  background-image: url('homepage.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%;
  font-family: 'Varela Round', sans-serif;
}
.form{
   background-color: white;
   padding: 10px;
   margin-top: 35px;
   margin-left: 40px;

}
.container h2{
  font-family: Cursive, sans-serif ;
  font-style: italic;
  color: #F08080;
}
#backgroundLogin{
   width: 500px;
   margin-left: 300px;
}
#mail{
   width: 91%;
}
.title{
  margin-top: 5px;
  margin-left: 10px;
  color: #4863A0;
  font-weight: bold;
  font-style: italic;
}
.form .form-control{
  margin-left: 15px;
  width: 400px;
}
#remember{
  margin-left: 14px;
}
#submit_btn{
   margin-left: 14px;
}
#erroMsg{
  background-color: pink;
  text-align: center;
  width: 300px;
  margin-left: 53px;
  background-color: #9FE2BF;
  opacity: 0.7;
  margin-top: 2px;
}
</style>
</head>

<body>

<?php
  $errorMsg="";
  $email=$pass="";
  $pass = $errorMsg="";
  if (isset($_POST["login"])) {
    $email = $_POST['email'];
    $pass = ($_POST['password']);   

    $conn = mysqli_connect("localhost", "root", "", "booklibrary1"); 
    $sql = "SELECT `id`, `name`, `email`, `password` from user where email='$email' and password = md5('$pass')";
    $res = mysqli_query($conn, $sql);
           
    if ($res->num_rows > 0) {
      $ro = $res->fetch_assoc();
      session_start();

      if(!empty($_POST["remember"])) {
         setcookie ("email",$_POST["email"],time()+ 15*60);
         setcookie ("password",$_POST["password"],time()+ 15*60);
         echo "<script>window.open('homePage.php','_self');</script>";
       }
           $_SESSION["id"] = $ro["id"];
           $_SESSION["name"] = $ro["name"];
           $_SESSION["password"] = $ro["password"];
           $_SESSION["email"] = $ro["email"];
              
           echo "<script>window.open('homePage.php','_self');</script>";
    
        }
        else{ 
          $errorMsg ="No Account Is Found";
        }
          mysqli_close($conn);
       }    
?>

<div class="container">
<div class="title">
<h2 style="font-size:5vw;text-align: center;">Book share house</h2> 
</div>
<span id="login_failed"></span>
<div id="backgroundLogin" >
<fieldset class="form">
   <form id="login_form" name="login" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        
      <?php  if ($errorMsg) {?>
        <p id="erroMsg">
        <span>*<?php  echo "$errorMsg";?></span></p><?php } ?>
        <div class="form-group">
        <p id="email">
        <label class="title" > Email</label>
        <input type="text" id="mail" name="email" placeholder="Type your email..." value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>" class="form-control"  required>
        </p></div>
        <div class="form-group">
        <p id="password">
        <label class="title">Password</label>
        <input type="password" name="password" placeholder="Type your password..." value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" class="form-control" required>
        </p></div>
        <div class="form-group">
        <p id="remember">
        <input type="checkbox" name="remember"><label style="font-size: medium;margin-left: 5px;color:#1569C7; ">Remember me</label>
        </p></div>
        <div class="form-group">
        <button href="homePage.html" type="submit" class="btn btn-primary" name="login" id="submit_btn">SignIn</button></div>
   </form>

  <a id="switchForm" href="signup.php">
  <p style="margin-left: 14px;">Not yet a member? Register now!</p></a>
  </fieldset>
</div>
</div>

<script type="text/javascript">
   $("#switchForm").click(function(){
  const isLoginVisible = $("#login_form").is(':not(:hidden)');
  if {
    $("#login_form").show();
    $("#register_form").hide();
    $("#switchForm > p").html("Not yet a member? Register now!");
  }
})
</script>
<script type="text/javascript">
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

</body>
</html>