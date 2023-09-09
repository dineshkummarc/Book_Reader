<?php
if (isset($_POST['book_name'])) {
   $conn = mysqli_connect("localhost", "root", "", "booklibrary1"); 
    $decision=$_POST['decision'];
    $book_name=$_POST['book_name'];
    $user_id  = $_POST['user_id'];
    $book_id  = $_POST['book_id'];
    echo "$book_id";
    $sql= mysqli_query($conn, "SELECT * FROM user_booklist where book_id='$book_id' AND user_id='$user_id'");
    $rowcheck= mysqli_num_rows($sql);
      if( $rowcheck>0){
        $query= "UPDATE user_booklist SET choice_list='$decision'  WHERE book_name='$book_name' AND user_id='$user_id'";
        $resource = mysqli_query($conn,$query)
        or die (mysqli_error($conn));
      }
      else{
      $query = "INSERT INTO user_booklist (`user_book_id`, `book_name`, `choice_list`, `book_id`, `user_id`) VALUES ('','$book_name','$decision','$book_id','$user_id')" ;
      	 $resource = mysqli_query($conn,$query)
         or die (mysqli_error($conn));
         echo 'user_booklist table is successfully updated to '.$decision; 
      }
      if ($decision=='None') {
      $query= "DELETE FROM user_booklist WHERE '$decision'='None' AND user_id='$user_id' AND book_name='$book_name' ";
        $resource = mysqli_query($conn,$query)
        or die (mysqli_error($conn));
      }   
}
?>