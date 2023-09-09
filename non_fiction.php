<style type="text/css">
.image{
  margin-left: -50px
  margin-top: -100px;
}
.listing{
	padding: 10px;
	margin-left: 15%;
}
#image-list{
	padding-left: 10px;
}
</style>


<?php
  $conn = mysqli_connect("localhost", "root", "", "booklibrary1"); 
  $sql = "SELECT * FROM booklist WHERE book_genre='Non-Fiction'";
  $result = mysqli_query($conn, $sql);
?>
<div class="booklist">

	<?php
   if (mysqli_num_rows($result) > 0) {
   	 echo "<div class='list'>";
          
         echo '<div class="image">';
         ?>
         <table><tr>
         <?php
         while($row = mysqli_fetch_array($result)){
         	 echo "<div class='listing'>";
         	 $image = $row["book_cover"];?>
           <td id="image-list"> <?php
           	echo '<a href="long_description.php?id='.$row['book_id'].'">'?>
             <img src="./booklist/images/<?php echo $image;?>.jpg" width="80px" height="150px" style="margin-top: -18px;margin-bottom: -20px;">
            </a>
           </td>
        <?php         
    }

    echo "</tr></table>";
    echo "</div>";
  }

?>
<br><br>
</div>
