<?php
session_start();
if(!isset($_SESSION["id"]))
{
    echo"<script>window.open('login.php?mes=Access Denied..','_self');</script>";  
}
$conn = mysqli_connect("localhost", "root", "", "booklibrary1"); 
$user_id= $_SESSION["id"];
$var = $_GET['id'];
$sql= "DELETE FROM `comment` WHERE comment_id = $var AND user_id= '$user_id'";
if (mysqli_query($conn, $sql)) {
    echo "<script>
       window.history.back();
      </script>";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>