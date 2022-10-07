<?php
if(isset($_POST["limit"], $_POST["start"]))
{
//  $connect = mysqli_connect("localhost", "root", "", "trueshipp");
//  $query = "SELECT * FROM tbl_posts ORDER BY post_id DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
//  $result = mysqli_query($connect, $query);
//  while($row = mysqli_fetch_array($result))
//  {
//   echo '
//   <h3>'.$row["title"].'</h3>
//   <p>'.$row["content"].'</p>
//   <p class="text-muted" align="right">By - '.$row["link"].'</p>
//   <hr />
//   ';
//  }

 require('db.php');
 $sql1= "SELECT * FROM tbl_posts ORDER BY id DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
 $result1 = $conn->query($sql1);

 while ($row = $result1->fetch_assoc()) 
 {
  echo '
  <h3>'.$row["title"].'</h3>
  <p>'.$row["content"].'</p>
  <p class="text-muted" align="right">By - '.$row["link"].'</p>
  <hr />
  ';
 }
}

?>