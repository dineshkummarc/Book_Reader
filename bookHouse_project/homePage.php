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
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="http://code.jquery.com/jquery-latest.min.js"></script>

</head>
<body>
<?php include("top_bar.php"); ?>
<style type="text/css">
.booklist {
    margin-top: 100px;
}
#author{
	margin-left: 20px;
}
.image{
    margin-top: -10px;
    margin-bottom: 15px;
}
.book_name{
	margin-top: -140px;margin-left: 90px;
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
#pages a:first-child {
	color: black;
}
#pages a:hover {
	text-decoration: underline;
}
.cart{
	margin-top: 10px;
	padding-bottom: 15px;
	margin-left: -10px;	
}
.status{
  width: 120px;
  background-color:#B4CFEC;
  color: black;
  border-color:#95B9C7; 
  font-size: 12px;
}
</style>

<?php
 $conn = mysqli_connect("localhost", "root", "", "booklibrary1"); 
 $sql = 'SELECT  * FROM booklist ORDER BY (book_rating) desc LIMIT 8';
 $result = mysqli_query($conn, $sql);  
?>

<div class="booklist">
<div class="list" style="margin-top: -50px;">
<h3 style="margin-left: 200px;margin-bottom: -8px;">Most Rated Books</h3>

<?php
 if (mysqli_num_rows($result) > 0 ) {
   	echo "<div class='list'>";
    while($row = mysqli_fetch_array($result)){
        echo "<div class='listing'>";
        $image = $row["book_cover"];?>
        <hr id='line'>
        <div class="image">
        <img src="./booklist/images/<?php echo $image;?>.jpg" width="80px" height="120px">
         </div>
        <div class="book_name">
          <a href='#' style="text-decoration: none;color: black;"><?php echo $row['book_name'];?></a></div>
        <div class="author">by <?php echo $row['book_author'];?></div>
		<div class="rating">Rating details.<?php echo number_format($row['book_rating']);?>ratings
		<div id="autosavenotify"></div>
             
        <table width="200px">
        	<tr><?php $book_id = $row["book_id"]; ?>
            <td class="myid"></td>   
            <td ><select class="status" id="status_<?php echo $book_id;?>" onchange="selectStatus(this)") bookname="<?php echo $row["book_name"];?>" userid="<?php echo $_SESSION['id'];?>" book_id="<?php echo $book_id;?>">
            <option value='select'>Select</option>
            <option value='Read'>Read</option>
            <option value='Want to Read'>Want to Read</option>
            <option value='Currently Reading'>Currently Reading</option>
               </select></td>
             </tr>
        </table>
        </div>
            <div class="description"><?php echo htmlspecialchars_decode($row['description']);?>
             <?php
             echo '<a href="long_description.php?id='.$row['book_id'].'"><b>more..</b></a>';
             ?>
             </div>
        </div>
        <?php        
    } ?>
    </div>
    	<div id="pages">
			<div id="numbers">
				<a href="homePage.php">1</a>
				<a href="secondlist.php">2</a>	
			</div>
		</div>
	<?php
  }
?>

<script type="text/javascript">
function selectStatus(e) {
       var book_name = $(e).attr('bookname');
       var decision = $("#"+e.id).children("option:selected").val();
       var user_id = $(e).attr('userid');
       var book_id = $(e).attr('book_id');
        
        $.ajax({
              type: "POST",
              url: "save.php",
              data: {decision: decision, book_name: book_name ,user_id:user_id, book_id:book_id},
              success: function(msg) {
                alert("successfully updated as " + decision);
              }
      })
}
</script>

<script type="text/javascript">
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<br><br>
</div>
</div>

</body>
</html>
