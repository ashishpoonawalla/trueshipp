<?php 
session_start();				
			$title = ($_POST['title']);
			$pcity = ($_POST['pcity']);
			$pdate = ($_POST['pdate']);
			$dcity = ($_POST['dcity']);
			$ddate = ($_POST['ddate']);
            $cat = ($_POST['category']);
            $price = ($_POST['price']);
            $size = ($_POST['size']);
            $pweight = ($_POST['pweight']);
            $num_pack = ($_POST['num_pack']);            
			$desc = ($_POST['desc']);

            $jid = ($_SESSION['jidedit']);
								
require('db.php');

	
// prepare and bind

try {
	$conn1 = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
	// set the PDO error mode to exception
	$conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$userID = $_SESSION["user_id"];
	// prepare sql and bind parameters



    $data = [
        'product_title' => $title,
        'PCity' => $pcity,
        'Pdate' => $pdate,
        'DCity' => $dcity,
        'DDate' => $ddate,
        'product_cat' => $cat,
        'product_price' => $price,

        'product_keywords' => $size,
        'pweight' => $pweight,
        'num_pack' =>  $num_pack,
        'product_desc' => $desc,
        'product_id' => $jid,
        

    ];
    $sql = "UPDATE products SET product_title=:product_title, PCity=:PCity, Pdate=:Pdate, DCity=:DCity, 
    DDate=:DDate, product_cat=:product_cat, product_price=:product_price, product_keywords=:product_keywords,
    pweight=:pweight, num_pack=:num_pack, product_desc=:product_desc WHERE product_id=:product_id ";
    $stmt= $conn1->prepare($sql);
  


//----------------------------------------------------


	if ( $stmt->execute($data) === TRUE) {
					
		
		$_SESSION["pidIMG"] = $jid ;
		header('Location: post_jobImg.php');
		
	} else {
		?>
		<div data-form-alert="true">
				<div data-form-alert-warning="true">Some Error when updating jobs!<a href='post_job.php'> Back To Job Posts </a></div><br><br><br><br><br><br><br>
			</div>
			<?php
			
		echo "Error Inserting record: " . $conn1->error;
	}
	
	$stmt->close();
	 
	
  } catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
  }
  $conn1 = null;


						
						?>