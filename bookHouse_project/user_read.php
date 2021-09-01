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
}
.book_name{
	font-size: 12px;
	padding-bottom: 5px;
	font-weight: bold;
	width: 90px; 
}
.author{
	padding-bottom: 5px;
	width: 90px;
	font-size: 12px;
}
.listing{
	padding: 10px;
	margin-bottom: 10px;
	margin-left: 15%;
}
.rating{
	font-size: 12px;
	padding-bottom: 5px;
}
.description{
	margin-left: -50px;
	margin-top: -10px;
	text-align: center;
	font-style: oblique;
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
.choice_link{
	margin-left: 100px;
	width: 150px;
}
.user_add_file{
	margin-left: 100px;
	margin-top: 30px;
}
table,th{
    padding: 5px;
    margin: 5px;
    padding-right: 50px;
    text-align: center;
}
.table-list{
	margin-left: 300px;
	margin-top: -150px;
}
td{
	padding-right: 20px;
	text-align: center;
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
$user_id=$_SESSION['id'];
$conn = mysqli_connect("localhost", "root", "", "booklibrary1"); 
$sql = "SELECT * FROM user_booklist INNER JOIN booklist ON user_booklist.book_name = booklist.book_name where user_id='$user_id' AND user_booklist.choice_list = 'Read'";
$result = mysqli_query($conn, $sql);
?>
<h3 style="margin-left: 100px;">My Booklist</h3>
<hr style="margin-left: 100px;width: 80%;border-color:pink;"></hr>
<div class="choice_link">
 	<div class="read">
    <?php	
	$result1 = mysqli_query($conn,"SELECT * FROM user_booklist WHERE choice_list='Read' AND user_id='$user_id'");
 	$count_read= mysqli_num_rows($result1);
 	?>
 	<a href="user_read.php">Read<?php echo (" (".$count_read.")");?></a>
    </div>

    <div class="c_read">
    <?php	
	$result2 = mysqli_query($conn,"SELECT * FROM user_booklist WHERE choice_list='Currently Reading' AND user_id='$user_id'");
 	$count_cread= mysqli_num_rows($result2);
 	?>
    <a href="user_current_read.php">Currently Reading<?php echo(" (".$count_cread.")");?></a></div> 
    <div class="w_read">
    <?php	
	$result3 = mysqli_query($conn,"SELECT * FROM user_booklist WHERE choice_list='Want to Read' AND user_id='$user_id'");
 	$count_wread= mysqli_num_rows($result3);
 	?>
    <a href="user_want_read.php">Want to Read<?php echo(" (".$count_wread.")");?></a></div> 
 </div>
 <div class="user_add_file">
 <a href="user_book_share.php">Want to share a book??</a>
</div>
<div class="booklist">

<div class="list" style="margin-top: -50px;">
<div class="table-list">
<table >
	<tr>
	<th>cover</th>
	<th>book name</th>
	<th>author</th>
	<th>rating</th>
	<th>status</th>
	<th>show book details</th>
	</tr>
	<tr><td colspan="6"><hr></hr></td></tr>
	
			<?php
        if (mysqli_num_rows($result) > 0 ) {
   	
         while($row = mysqli_fetch_array($result)){
         	 $image = $row["book_cover"];?>
         	 <tr>
         	 <td>
         	  <div class="image">
             <img src="./booklist/images/<?php echo $image;?>.jpg" width="60px" height="70px">
            </div></td>
            <td>
            <div class="book_name"><?php echo $row['book_name'];?></div>
             </td>
             <td>
             <div class="author"><?php echo $row['book_author'];?></div>
             </td>
             <td>
             <div class="rating"><?php echo number_format($row['book_rating']);?>
             </td>
             <td>
    <div id="autosavenotify">
    <?php $book_id = $row["book_id"];?> 
    <select class="status" id="status_<?php echo $book_id;?>" onchange="selectStatus(this)") bookname="<?php echo $row["book_name"];?>" userid="<?php echo $_SESSION['id'];?>" book_id="<?php echo $book_id;?>">
     
    <option value='None'>None</option>
    <option value='Read' <?php if($row['choice_list'] == 'Read'){ echo ' selected="selected"'; } ?>>Read</option>
    
    <option value='Want to Read' <?php if($row['choice_list'] == 'Want to Read'){ echo ' selected="selected"'; } ?>>Want to Read</option>
   
    <option value='Currently Reading'  <?php if($row['choice_list'] == 'Currently Reading'){ echo ' selected="selected"'; } ?>>Currently Reading</option>
    </select>
    </div>
            </td>
            <td>
            <div class="description">
            <?php
            echo '<a href="long_description.php?id='.$row['book_id'].'"><b>view </b><i class="fa fa-angle-double-right"></i></a>';
             ?>
            </div>
            </td>
            </tr>
            <tr><td colspan="6" ><hr></hr></td></tr>
         <?php
         }
     }
     ?>	
</table>
</div>

<script type="text/javascript">
function selectStatus(e) {
       var book_name = $(e).attr('bookname');
       var decision = $("#"+e.id).val();
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
