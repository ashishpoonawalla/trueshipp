<?php

$del2 = $_REQUEST["jobdelid"];

require('db.php');
		
$sql="DELETE FROM products Where product_id=$del2 " ;

if ($conn->query($sql) === TRUE) {

}
else
{
   // echo "Error Inserting record: " . $conn->error;
}
header('Location: my_jobs.php');

?>