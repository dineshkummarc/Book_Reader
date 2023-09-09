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
<style type="text/css">
.fiction{
	margin-left: 150px;
	margin-top: 120px;
	margin-bottom: 40px;
}
.fic{
	margin-left: -40px;
}
.non_fic{
	margin-left: -40px;
	margin-top: 40px;
}
.mys{
	margin-left: -40px;
}
.rms{
	margin-left: -40px;
}
.ptry{
	margin-left: -40px;
}
</style>
</head>

<body>
 <?php include("top_bar.php"); ?>
<div class="genre">
	<div class="fiction">
	<a href="fic_list.php" class="fic">Fiction</a>
	<?php include('fiction.php'); ?>
	</div>
	<div class="non_fiction">
	<a href="nonfic_list.php" class="non_fic">Non-Fiction</a>
	<?php include('non_fiction.php'); ?>
	</div>
	<div class="Romance">
	   <a href="rms_list.php" class="rms">Romance</a>
	   <?php include('romance.php'); ?>
	</div>
	<div class="Mystery">
		<a href="mystery_list.php" class="mys" >Mystery</a>
		<?php include('mystery.php'); ?>
	</div>
	<div class="poetry">
		<a href="poet_list.php" class="ptry" >Poetry</a>
		<?php include('poetry.php'); ?>
	</div>
</div>
</body>
</html>