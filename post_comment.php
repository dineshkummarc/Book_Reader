 <style type="text/css">
  .reply-list{
    margin-left: 280px;
    background-color: pink;
    margin-top: 10px;
    width: 46%;
    padding: 5px;
  }
.post_reply{
  font-size: 18px;
  font-family: Snell Roundhand, cursive;
  color: #052348;
}
.date_2{
  margin-left: 100px;
  padding-left: 280px;
  font-size: 12px;
}
.post_2{
  margin-left: 22px;
  text-align: justify-all;
  white-space: normal;
  padding-right: 25px;
  font-family: Arial, sans-serif;
  font-size: 15px;
  padding-top: 10px; padding-bottom: 10px;
}
 </style>
 <?php
  $sql = "SELECT * FROM comment LEFT JOIN user on user.id = comment.user_id Where discussion_id= $discussion_id";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    while($ans = mysqli_fetch_array($result)){
        echo "<div class='reply-list'>";
    ?>
        <div class="book_reply">
        <table><tr>
        <td class="post_reply"><?php echo $ans['name'];?></td>
        <td class="date_2"><?php echo $ans['created_at'];?><td>
        <td><?php  if ($ans['user_id'] == $_SESSION['id'] ) { ?>
        <a href="delete_dis_comment.php?id=<?php echo $ans['comment_id']; ?>"><span class="glyphicon glyphicon-trash" style="margin-left:10px;font-size: 13px;margin-top: -5px;"></span></a><?php } ?></td>
        </tr></table>
        <div class="post_2" style='word-break: break-all; white-space: normal;'><?php echo nl2br($ans['comment']);?></div>
           </div></div>
<?php
}
}
?>
