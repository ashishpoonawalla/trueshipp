<?php
		$pid=$_REQUEST['var'];
			
			
			
			require('db.php');
			
						
			$sql="DELETE FROM cart where id=$pid " ;

			
			if ($conn->query($sql) === TRUE) {
				    echo "Success";
				} else {
				    echo "Error Inserting record: " . $conn->error;
				}

						
				$conn->close();
				
			
			header('Location: checkout.php');
				
?>