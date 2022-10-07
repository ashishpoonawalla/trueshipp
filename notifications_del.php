<?php

$del2 = $_REQUEST["nid"];

require('db.php');
		
$sql="DELETE FROM notifications Where nid=$del2 " ;

if ($conn->query($sql) === TRUE) {

}
else
{
   // echo "Error Inserting record: " . $conn->error;
}
header('Location: notifications.php');

?>