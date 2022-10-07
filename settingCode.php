<?php 
session_start();				
			$fname = ($_POST['fname']);
			$mobile = ($_POST['mobile']);
			$address = ($_POST['address']);
			$city = ($_POST['city']);
			$pin = ($_POST['pin']);
            $desc = ($_POST['desc']);


            $unmemail = $_SESSION["username"];
            

								
							require('db.php');


// prepare and bind

try {
	$conn1 = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
	// set the PDO error mode to exception
	$conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$userID = $_SESSION["user_id"];
	// prepare sql and bind parameters



    $data = [
        'first_name' => $fname,
        'mobile' => $mobile,
        'address' => $address,
        'city' => $city,
        'pin' => $pin,
        'details' => $desc,
        'email' => $unmemail,
    ];
    $sql = "UPDATE user_info SET first_name=:first_name, mobile=:mobile, address=:address, city=:city, pin=:pin, details=:details WHERE email=:email ";
    $stmt= $conn1->prepare($sql);
    $stmt->execute($data);




/*
	$stmt = $conn1->prepare("Update user_info SET first_name=:first_name, mobile=:mobile, address=:address, city=:city, pin=:pin, details=:detail WHERE email='$unmemail'  ");
	$stmt->bindParam(':first_name',$fname);
	$stmt->bindParam(':mobile', $mobile);	
	$stmt->bindParam(':address', $address);
	$stmt->bindParam(':city', $city);
	$stmt->bindParam(':pin', $pin);  
	$stmt->bindParam(':details', $desc);	




	if ($stmt->execute() === TRUE) {
					
		
		//header('Location: setting.php');
		
	} else {
		?>
		<div data-form-alert="true">
				<div data-form-alert-warning="true">Some Error when creating jobs!<a href='post_job.php'> Back To Job Posts </a></div><br><br><br><br><br><br><br>
			</div>
			<?php
			
		echo "Error Inserting record: " . $conn1->error;
	}
	
	
	$stmt->close();
*/	 
	//echo "New records created successfully";
  } catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
  }
  $conn1 = null;

  header('Location: setting.php');




					
						?>