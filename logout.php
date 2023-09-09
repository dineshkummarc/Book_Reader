<?php
	include('connection.php');
	if(isset($_COOKIE['name'])) $user = $_COOKIE['name'];
	if(isset($_SESSION['name'])) $user = $_SESSION['name'];
	if(!isset($user)){
	echo"<script>window.open('signIn.php?mes=Access Denied..','_self');</script>";
	}
	$sql = "select * from user";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
        $r=$row["name"];
		}
	}
session_unset();
session_destroy();
$cookie_name = 'name';
$cookie_value = $r;
setcookie($cookie_name, $cookie_value, time()*30-60);
echo "<script>window.open('signIn.php','_self');</script>";
mysqli_close($conn);

?>