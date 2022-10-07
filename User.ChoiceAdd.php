<?php 
							require('db.php');
			session_start();
			$oid = ($_REQUEST['oid']);
			$bnm = ($_REQUEST['bnm']);
			$uid = $_SESSION["uid"];
		
			$sql="SELECT * FROM user_choice WHERE brand_id=$oid AND user_id=$uid " ;
			
			$result = $conn->query($sql);

			if($row = $result->fetch_assoc())
			{
				$sql1="Delete From user_choice Where brand_id=$oid AND user_id=$uid" ;
				
				if ($conn->query($sql1) === TRUE) {
					
					echo "Success...";
				    
				}
				else
				{
					echo "Failed...";
				}	
			}
			else
			{
				
				$sql1="INSERT INTO user_choice (brand_id, user_id) Values($oid, $uid) " ;
				//echo "$sql1 <br>";
				if ($conn->query($sql1) === TRUE) {
					
					echo "Success...2";
				    
				}
				else
				{
					echo "Failed...2";
				}
			}					
			
						
				$conn->close();

				header('Location: User.Choice.php');
						
						
						?>