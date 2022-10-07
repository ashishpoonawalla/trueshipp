<?php
session_start();			
require('db.php');

$jobid  = $_GET["jobid"]; 
$psid  = $_GET["psid"]; 

$_SESSION["jobid"] = $jobid;
$_SESSION["psid"] = $psid;

$_SESSION["suid"] = $_SESSION["username"] ;  
$_SESSION["sfnm"] = $_SESSION["first_name"];
$_SESSION["simg"] = $_SESSION["uimage"];


$sql222="SELECT * FROM product_seller Where psid=$psid" ;
//$sql222="SELECT * FROM product_seller Where product_id=$jobid" ;
$result222 = $conn222->query($sql222);

  if($row222 = $result222->fetch_assoc())
  {
  
    $sid222=$row222['username'];
    $rat222=$row222['rate'];
    $fnm222=$row222['full_name'];
    $img222=$row222['proImg'];
    $let222=$row222['coverLetter'];
  }

  $_SESSION["ruid"] = $sid222; 
  $_SESSION["rfnm"] = $fnm222;
  $_SESSION["rimg"] = $img222;


  $suid = $_SESSION["suid"];
  $sfnm = $_SESSION["sfnm"];
  $simg = $_SESSION["simg"];

  $ruid = $_SESSION["ruid"];
  $rfnm = $_SESSION["rfnm"];
  $rimg = $_SESSION["rimg"];

  //$sql1="SELECT * FROM chat Where jobid=$jobid AND suid='$suid' AND ruid='$ruid'" ;
  $sql1="SELECT * FROM chat Where psid=$psid " ;
  
 
        $result1 = $conn->query($sql1);
        

        if($row1 = $result1->fetch_assoc())
          {
            //echo $sql1;
          }
          else
          {
            $sql33="INSERT INTO chat(chatmessage, jobid, suid, sfnm, simg, ruid, rfnm, rimg, psid) Values('hi','$jobid','$suid','$sfnm','$simg','$ruid','$rfnm','$rimg', $psid) " ;
			      $conn->query($sql33) ;
            //echo $sql33;
          }


          header('Location: message.php');

  ?>