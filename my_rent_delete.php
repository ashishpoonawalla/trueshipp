<?php

$del2 = $_REQUEST["psid"];

require('db.php');
		
$sql="DELETE FROM product_seller Where psid=$del2 " ;

if ($conn->query($sql) === TRUE) {

}
else
{
   // echo "Error Inserting record: " . $conn->error;
}
header('Location: my_rent.php');

?>