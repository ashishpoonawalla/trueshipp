<?php


$servername = "localhost";
$username = "root";
$password = "";
$db = "trueshipp";

/*
$servername = "localhost";
$username = "id16188829_ashish";
$password = "maucom007";
$db = "id16188829_trueshipp";
*/


// Create connection
//$conn = mysqli_connect($servername, $username, $password,$db);
$conn=new mysqli($servername, $username, $password,$db);	
$conn222=new mysqli($servername, $username, $password,$db);	

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



/*

 -------------------WHILE -- SELECT

							require('db.php');
							
							$sql1="SELECT * FROM products Where product_keywords='Best Seller' " ;
							
							$result1 = $conn->query($sql1);

							
							while($row1 = $result1->fetch_assoc())
							{
							  	$pid1=$row1['product_id'];
							  	$img1=$row1['product_image'];
								$tit1=$row1['product_title'];
								$pri1=$row1['product_price'];
							}
							
							
							

-------------------------- SELECT

							require('db.php');	
							$sql="SELECT * FROM products where product_id=$pid" ;
			
							$result = $conn->query($sql);
			
							if($row = $result->fetch_assoc())
			  				{
							  	
							  	$img1= $row['product_image'];
								$img2= $row['img2'];
								$img3= $row['img3'];
								$img4= $row['img4'];
							}




-------------------------- INSERT 

			require('db.php');
		    
			$sql="INSERT INTO products(SKU, product_title, product_price, product_brand, product_cat, product_desc, product_keywords, product_image, img2, img3, img4) Values('$sku','$title','$price','$brand','$cat','$des',' ','noimg.png','noimg.png','noimg.png','noimg.png') " ;
			
			if ($conn->query($sql) === TRUE) {
					
					$last_id = $conn->insert_id;
					session_start();
					$_SESSION["pidIMG"] = $last_id ;
				    header('Location: Seller.ProductImg.php');
					
			}	


-------------------------- UPDATE

			require('db.php');
		    
			$sql="UPDATE products SET SKU='A333', product_title='ABCD' Where product_id=1";
			
			if ($conn->query($sql) === TRUE) {
			    echo "Record updated successfully";
			} else {
			    echo "Error updating record: " . $conn->error;
			}



-------------------------- DELETE

			require('db.php');
		    
			$sql="DELETE FROM products Where product_id=1";
			
			if ($conn->query($sql) === TRUE) {
				echo "Record updated successfully";
			} else {
			    echo "Error updating record: " . $conn->error;
			}



*/




?>