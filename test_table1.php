<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>List Of Customers</h2>

<div class="row">   

    <a href="add.php" class="btn btn-success">Create</a>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Brand ID</th>
        <th>Brand Name</th>       
        <th>Action</th>  
      </tr>
    </thead>
    <tbody>


<?php

include 'db.php';


$limit = 4; 


    if (isset($_GET["page"] )) 
        {
        $page  = $_GET["page"]; 
        } 
    else 
       {
        $page=1; 
       };  

$record_index= ($page-1) * $limit;      



 $sql = "SELECT * FROM brands LIMIT $record_index, $limit";

   $retval = mysqli_query($conn, $sql);
//  print_r($retval);


   if (mysqli_num_rows($retval) > 0) {

         while($row = mysqli_fetch_assoc($retval)) {

        echo '<tr>';

                            echo '<td>'. $row['brand_id'] . '</td>';
                            echo '<td>'. $row['brand_title'] . '</td>';                            
                            echo '<td>'. "<a class='btn btn-primary' href=edit.php?id=".$row["brand_id"].">&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;&nbsp;</a>&nbsp;"."<a class='btn btn-danger' href=delete.php?id=".$row["brand_id"].">&nbsp;&nbsp;Delete</a><br>";
     }


} 
    else {
    echo "0 results";
}



echo "</tbody>";  
 echo "</table>";


$sql = "SELECT COUNT(*) FROM brands"; 
$retval1 = mysqli_query($conn, $sql);  
$row = mysqli_fetch_row($retval1);  
$total_records = $row[0];
    //  echo $total_records;
$total_pages = ceil($total_records / $limit);  
//$pagLink = "<div class='pagination'>";  
echo "<ul class='pagination'>";
echo "<li><a href='test_table1.php?page=".($page-1)."' class='button'>Previous</a></li>"; 
    for ($i=1; $i<=$total_pages; $i++) {  
        echo "<li><a href='test_table1.php?page=".$i."'>".$i."</a></li>";
    };  
echo "<li><a href='test_table1.php?page=".($page+1)."' class='button'>NEXT</a></li>";
echo"</ul>";    

//echo $pagLink . "</div>";     
    mysqli_close($conn);
?>


    </div>
</div>

</body>
</html>