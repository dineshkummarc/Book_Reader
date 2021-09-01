<?php include("top_bar.php");
 $conn = mysqli_connect("localhost", "root", "", "booklibrary1"); 
 $sql = "SELECT * FROM discussion";
 $result = mysqli_query($conn, $sql);
	?>
<div class="booklist">
<div class="list">
	<?php
   if (mysqli_num_rows($result) > 0) {
   	 echo "<div class='list'>";
      while($row = mysqli_fetch_array($result)){
         echo "<div class='listing'>"; 	 
			 $splitTimeStamp = explode(" ",$row['created_at']);
			 $date = $splitTimeStamp[0];
             $time = $splitTimeStamp[1];
         	?>
            <div class="list_des" >
              <div class="book_topic">
              	<div class="post"><?php echo $row['user_name'];?></div>
               <div class="date"><?php echo  date('F j, Y', strtotime($date))." time: ".$time."  ";?></div>
             <a href='#' style="text-decoration: none;color: black;"><?php echo $row['book_name'];?></a></div>
             <div class="post"><?php echo $row['comment'];?></div>
<?php
}
}
?>