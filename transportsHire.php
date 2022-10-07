<?php 
        session_start();	
        $tunm1 = $_POST['tunm1'];
        $tfnm1 =  $_POST['tfnm1'];
        $status1 = "Hire";
        
			$title = ($_POST['title']);
			$pcity = ($_POST['pcity']);
			$paddress = ($_POST['paddress']);
			$pdate = ($_POST['pdate']);
			$dcity = ($_POST['dcity']);
			$daddress = ($_POST['daddress']);
			$ddate = ($_POST['ddate']);
            $cat = ($_POST['category']);
            $price = ($_POST['price']);
            $size = ($_POST['size']);
            $pweight = ($_POST['pweight']);
            $num_pack = ($_POST['num_pack']);            
			$desc = ($_POST['desc']);
								
require('db.php');


// prepare and bind

try {
	$conn1 = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
	// set the PDO error mode to exception
	$conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$userID = $_SESSION["user_id"];
	// prepare sql and bind parameters
	$stmt = $conn1->prepare("INSERT INTO products(product_title, userID, PCity, PAddress, Pdate, DCity, DAddress, DDate, product_cat, product_price, product_keywords, pweight, num_pack, product_desc, tusername, tname, tprice, status1) 
	VALUES (:product_title,  :userID, :PCity, :PAddress, :Pdate, :DCity, :DAddress, :DDate, :product_cat, :product_price, :product_keywords, :pweight, :num_pack, :product_desc, :tusername, :tname, :tprice, :status1) ");
	$stmt->bindParam(':product_title', $title);
	$stmt->bindParam(':userID', $userID);	
	$stmt->bindParam(':PCity', $pcity);
	$stmt->bindParam(':PAddress', $paddress);
	$stmt->bindParam(':Pdate', $pdate);

	$stmt->bindParam(':DCity', $dcity);  
	$stmt->bindParam(':DAddress', $daddress);  
	$stmt->bindParam(':DDate', $ddate);
	$stmt->bindParam(':product_cat', $cat);
	$stmt->bindParam(':product_price', $price);

	$stmt->bindParam(':product_keywords', $size);  
	$stmt->bindParam(':pweight', $pweight);
	$stmt->bindParam(':num_pack', $num_pack);
	$stmt->bindParam(':product_desc', $desc);

    $stmt->bindParam(':tusername', $tunm1);	
    $stmt->bindParam(':tname', $tfnm1);	
    $stmt->bindParam(':tprice', $price);	
    $stmt->bindParam(':status1', $status1);	



	if ($stmt->execute() === TRUE) {
					
		$pid1 = $last_id = $conn1->lastInsertId();
		//session_start();
		$_SESSION["pidIMG"] = $last_id ;



//-----------------------------------------------------


                $jobbid = $price;
                $jobdetails = "Hiring for this job.";
                $proImg ="";
                require('db.php');

                try {

                //$conn1 = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
                // set the PDO error mode to exception
                //$conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                // prepare sql and bind parameters
                $stmt = $conn1->prepare("INSERT INTO product_seller(product_id, username, rate,  full_name, proImg, coverLetter) 
                VALUES (:product_id, :username, :rate, :full_name, :proImg, :coverLetter) ");

                $stmt->bindParam(':product_id', $pid1);
                $stmt->bindParam(':username', $tunm1);
                $stmt->bindParam(':rate', $jobbid);
                $stmt->bindParam(':full_name', $tfnm1);                
                $stmt->bindParam(':proImg', $proImg);
                $stmt->bindParam(':coverLetter', $jobdetails);              


                if ($stmt->execute() === TRUE) {
                    
                            
                    
                //------------------ Get reciever info ------------------------
                   
                    
                        $name80 = $tfnm1;
                        $email80 = $tunm1;
                   
                    $uname80 = $_SESSION["username"] ; 	
                    $fname80 = $_SESSION["first_name"];

                    
                //------------------ Send notifications ------------------------      
                    $ntype = "job";   
                    $nmessage = "Hire you on job.";
                    $stmt12 = $conn1->prepare("INSERT INTO notifications (nmessage, jobid, suid, sfnm, ruid, rfnm, ntype) 
                    VALUES (:nmessage, :jobid, :suid, :sfnm, :ruid, :rfnm, :ntype) ");

                    $stmt12->bindParam(':nmessage', $nmessage);
                    $stmt12->bindParam(':jobid', $pid1);

                    $stmt12->bindParam(':suid', $_SESSION["username"]);
                    $stmt12->bindParam(':sfnm', $_SESSION["first_name"]);

                    $stmt12->bindParam(':ruid', $email80);                
                    $stmt12->bindParam(':rfnm', $name80);
                    $stmt12->bindParam(':ntype', $ntype);
                    $stmt12->execute();


                    echo '<script>alert("You have bid successfully on this job.")</script>';


                //------------------ Send email ------------------------
                    //session_start();
                    $_SESSION["eml_to"] = $email80;

                    $_SESSION["eml_sub"] = "Hire you on job: $tit1 ";

                    $_SESSION["eml_mes"] = "Dear $name80, <br><br>$fname80 is hire you on project for Rs. $jobbid<br>
                                            Project: $tit1, $PCity to $DCity.
                                            <br><a target='_blank' href='https://trueshipp.com/my_job_detail.php?jobid=$pid1'>Click here to Open</a>";

                    $_SESSION["eml_bcc"] = "trueshipp@gmail.com";

                    include_once("emailsend.php");
                    
                    //------------- End send email -------------------------
                                    
                } else {
                    echo '<script>alert("Warning! Error bidding on this job.")</script>';
                    
                    //echo "Error Inserting record: " . $conn1->error;
                }
                
                
                //$stmt->close();
                
                //echo "New records created successfully";
                } catch(PDOException $e) {
                //echo "Error: " . $e->getMessage();
                }
                $conn1 = null;












//-----------------------------------------------------

		header('Location: post_jobImg.php');
		
	} else {
		?>
		<div data-form-alert="true">
				<div data-form-alert-warning="true">Some Error when creating jobs!<a href='post_job.php'> Back To Job Posts </a></div><br><br><br><br><br><br><br>
			</div>
			<?php
			
		echo "Error Inserting record: " . $conn1->error;

	}
	
	
	$stmt->close();
	 
	echo "New records created successfully";
  } catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
  }
  $conn1 = null;



		
?>