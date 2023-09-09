
<style type="text/css">
.booklist {

    margin-top: 100px;

}
#author{
	margin-left: 20px;
}
</style>
<style type="text/css">

.image{
  margin-top: -10px;
  margin-bottom: 15px;
}
.book_name{
	margin-top: -157px;margin-left: 90px;
	font-size: 22px;
	padding-bottom: 5px;
	font-weight: bold;
	
    
}
.author{
	margin-left: 89px;
	padding-bottom: 5px;
}
.listing{
	padding: 10px;
	margin-bottom: 10px;
	margin-left: 15%;
}
.rating{
	margin-left: 89px;
	font-size: 12px;
	color: blue;
	padding-bottom: 5px;
}
.description{
	width: 70%;
	margin-left: 90px;
	text-align: justify;
	font-style: oblique;
	font-size: 15px;
}
#line{
	margin-bottom: 15px;
	width: 80%;
	margin-left: -10px;
}
#pages {
	width: 500px;
	border-top: 1px solid #E4E4E4;
	margin-left: 30%;
	font-size: 20px;
}

#pages img {
	display: block;
	margin: auto;
	padding-top: 30px;
}

#numbers {
	margin-top: 3px;
	margin-left: 50%;

}

#pages a {
	display: inline-block;
	
	text-decoration: none;
	color: #4285F4;
	margin-right: 8.5px; 
	padding-bottom: 10px;
}

#pages a:nth-child(2){
	color: black;
}



#pages a:hover {
	text-decoration: underline;
}
</style>


<?php include("top_bar.php"); ?>
<?php

 $conn = mysqli_connect("localhost", "root", "", "booklibrary1"); 
  $sql = 'SELECT  * FROM booklist WHERE book_genre="Fiction"';
   $result = mysqli_query($conn, $sql);
  
	?>
<div class="booklist">
<div class="list" style="margin-top: -50px;">
<h3 style="margin-left: 200px;margin-bottom: -8px;">Fiction Books</h3>
	<?php
   if (mysqli_num_rows($result) > 0 ) {
   	 echo "<div class='list'>";

         while($row = mysqli_fetch_array($result)){
         	 echo "<div class='listing'>";
         	 $image = $row["book_cover"];?>
         	 <hr id='line'>
         	  <div class="image">
             <img src="./booklist/images/<?php echo $image;?>.jpg" width="80px" height="150px">
            </div>
              <div class="book_name">
             <a href='#' style="text-decoration: none;color: black;"><?php echo $row['book_name'];?></a></div>
             <div class="author">by <?php echo $row['book_author'];?></div>

             <div class="rating">Rating details.<?php echo number_format($row['book_rating']);?>ratings</div>
             <div class="description"><?php echo htmlspecialchars_decode($row['description']);?>
             <?php
             echo '<a href="long_description.php?id='.$row['book_id'].'"><b>more..</b></a>';
             ?>
             
             </div>
           </div>
           
        
        <?php
              
    }
  }

?>

<br><br>
</div>
</div>

