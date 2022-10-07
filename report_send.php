<?php 
        session_start();
    
        $rpid = ($_POST['rpid']);
        $rtype = ($_POST['rtype']);	
        $rcomment = ($_POST['rcomment']);		
        $ruserid = ($_POST['ruserid']);
        $rname = ($_POST['rname']);
        $rcategory = ($_POST['rcategory']);

        $semail ="";
        

if (isset($_SESSION["username"])){
  $semail = $_SESSION["username"];
  $stype = "USER";
  $sname = $_SESSION["first_name"];       
  $sphone = $_SESSION["mobile"];
  
}else if (isset($_SESSION["uname"])){
  $semail = $_SESSION["uname"];
  $stype = "TRANSPORTER";
  $sname = $_SESSION["full_name"];       
  $sphone = $_SESSION["mobile"];
}

        //$semail = $_SESSION["username"];
       
        // $stype = $_POST["stype"];
        
require('db.php');


try {
	$conn1 = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
	// set the PDO error mode to exception
	$conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$userID = $_SESSION["user_id"];
	// prepare sql and bind parameters
	$stmt = $conn1->prepare("INSERT INTO reportissues (rpid, rtype, rcomment, ruserid, rname, rcategory, semail, sname, sphone, stype) 
	VALUES (:rpid, :rtype, :rcomment, :ruserid, :rname, :rcategory, :semail, :sname, :sphone, :stype) ");

  $stmt->bindParam(':rpid', $rpid);
	$stmt->bindParam(':rtype', $rtype);
	$stmt->bindParam(':rcomment', $rcomment);	
	$stmt->bindParam(':ruserid', $ruserid);
	$stmt->bindParam(':rname', $rname);
	$stmt->bindParam(':rcategory', $rcategory);

	$stmt->bindParam(':semail', $semail);  
	$stmt->bindParam(':sname', $sname);  
	$stmt->bindParam(':sphone', $sphone);
	$stmt->bindParam(':stype', $stype);
	

        if ($stmt->execute() === TRUE) {
          echo '<script>alert("report send to trueshipp team succesfully.")</script>';
        }


        
	//$stmt->close();
	 
	
  } catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
  }
  $conn1 = null;


  if ($rcategory == "transporter"){
    header('Location: transports.php');
  }
  if ($rcategory == "vehicle"){
    header('Location: vehicle_detail.php?jobid='.$rpid);
  }
  if ($rcategory == "job"){
    header('Location: Job_detail.php?jobid='.$rpid);
  }
?>