<?php
		$pid=$_POST['pid'];
		$psid=$_POST['psid'];
		echo "$pid - $psid";	
			session_start();
		 	$un1 = session_id();
			
			require('db.php');
			
			$sql="SELECT * FROM cart WHERE p_id='$pid' AND ip_add='$un1' " ;
				$result = $conn->query($sql);

				 if($row = $result->fetch_assoc())
				  {
			
				}
				else
				{
					
				require('db.php');
			
				$sql5="SELECT * FROM product_seller WHERE psid=$psid " ;
				$result5 = $conn->query($sql5);
				$un ="";
				$rt=0;
				 if($row5 = $result5->fetch_assoc())
				  {
					$un=$row5['username'];
					$rt=$row5['rate'];
				  }
			
			$sql="INSERT INTO cart (p_id,ip_add,qty, rate, username, psid) Values('$pid','$un1',1, $rt, '$un', $psid) " ;

			
			if ($conn->query($sql) === TRUE) {
				    echo "Success";
				} else {
				    echo "Error Inserting record: " . $conn->error;
				}

						
				$conn->close();
				
			}	
			header('Location: Cart.php');
				
?>