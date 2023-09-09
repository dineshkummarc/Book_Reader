<?php
if ($_SERVER["REQUEST_METHOD"]=="POST") {
  if (isset($_POST["submit"])) {
    $sbook_name = $_POST["sbook_name"];
    $author_name = $_POST["author_name"];
    $share_user = $_SESSION['id'];
    $filename = $_FILES['myfile']['name'];
    $sql = "INSERT INTO user_share_book (`book_share_id`, `user_id`, `share_book_name`, `book_author`, `share_file`, `size`)  VALUES ('','$share_user','$sbook_name','$author_name',$filename', $size)";
      if (mysqli_query($conn, $sql)) {
                echo "<div class='success1'>Insert Success.</div>";
        }
     else {
        echo "<div class='error'>Insert Error.</div>";
        }
    }
}
  ?>

