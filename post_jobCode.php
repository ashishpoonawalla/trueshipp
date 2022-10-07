<?php 
session_start();				
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
	$stmt = $conn1->prepare("INSERT INTO products(product_title, userID, PCity, PAddress, Pdate, DCity, DAddress, DDate, product_cat, product_price, product_keywords, pweight, num_pack, product_desc) 
	VALUES (:product_title,  :userID, :PCity, :PAddress, :Pdate, :DCity, :DAddress, :DDate, :product_cat, :product_price, :product_keywords, :pweight, :num_pack, :product_desc) ");
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




	if ($stmt->execute() === TRUE) {
					
		$last_id = $conn1->lastInsertId();
		session_start();
		$_SESSION["pidIMG"] = $last_id ;
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





/*
$sql="INSERT INTO products(product_title, PCity, Pdate,   DCity,   DDate, product_cat, product_price, product_keywords, pweight, num_pack, product_desc, product_image, img2, img3, img4,  status1) 
                    Values('$title',  '$pcity','$pdate','$dcity','$ddate','$cat',     '$price',      '$size',         '$pweight','$num_pack','$desc',   'noimg.png','noimg.png','noimg.png','noimg.png','Ok') " ;
			
				if ($conn->query($sql) === TRUE) {
					
					$last_id = $conn->insert_id;
					session_start();
					$_SESSION["pidIMG"] = $last_id ;
				    header('Location: post_jobImg.php');
					
				} else {
					?>
					<div data-form-alert="true">
                            <div data-form-alert-warning="true">Some Error when creating jobs!<a href='post_job.php'> Back To Job Posts </a></div><br><br><br><br><br><br><br>
                        </div>
						<?php
						
				    echo "Error Inserting record: " . $conn->error;
				}

						
				$conn->close();

*/					
						
						?>