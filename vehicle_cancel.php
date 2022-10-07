<?php

$del2 = $_REQUEST["jobid"];
$psid11 = $_REQUEST['psid'];

require('db.php');
		
$sql="Update products SET status1='Cancel - Pending' Where product_id=$del2 " ;
$sql="Update product_seller SET status2='Cancel - Pending' Where psid=$psid11 " ;

if ($conn->query($sql) === TRUE) {
    
    


}
else
{
    echo "Error Inserting record: " . $conn->error;
}
header('Location: my_rent.php');

?>