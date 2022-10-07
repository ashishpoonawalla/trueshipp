<?php

$del2 = $_REQUEST["jobid"];

require('db.php');
		
$sql="Update products SET status1='Cancel - Pending' Where product_id=$del2 " ;

if ($conn->query($sql) === TRUE) {
    
    






}
else
{
    echo "Error Inserting record: " . $conn->error;
}
header('Location: my_awarded.php');

?>