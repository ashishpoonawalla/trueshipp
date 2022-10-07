<?php

$nid = $_REQUEST["nid"];
$ntype = $_REQUEST["ntype"];
$jobid = $_REQUEST["jobid"];

require('db.php');
		
$sql="UPDATE notifications SET status1='Y' Where nid=$nid " ;

if ($conn->query($sql) === TRUE) {

}
else
{
   // echo "Error Inserting record: " . $conn->error;
}

  if ($ntype == "job"){
    header('Location: my_job_detail.php?jobid='.$jobid);
  }
  if ($ntype == "vehicle" || $ntype == "BOOK"){
    header('Location: vehicle_detail.php?jobid='.$jobid);
  }
  if ($ntype == "transporter"){
    header('Location: transports.php');
  }
  if ($ntype == ""){
    header('Location:notifications.php');
  }
  
  

?>