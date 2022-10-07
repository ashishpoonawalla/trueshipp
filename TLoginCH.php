<?php

				
	    		$uname = ($_POST['email']);
        		$pass = ($_POST['password']);
				
				$pass = md5($pass )	;	
								
				require('db.php');
		
				$sql="SELECT * FROM seller_info WHERE username='$uname' AND password='$pass' " ;
				$result = $conn->query($sql);

				 if($row = $result->fetch_assoc())
				  {
				  					
					session_start();
					$_SESSION["verify"] = $row["emailverify"];

				
					
					// if($row["emailverify"] == "Verify"){
						

						if ($row["status1"] == "Blocked")
						{
							header('Location: TLogin.php?var=Your account is blocked, please contact to trueshipp@gmail.com ');
							exit();
						}


						$_SESSION["uname"] = $uname; 					$_SESSION["username"] = null;
						$_SESSION["proimg"] = $row["proImg"];					
						$_SESSION["StoreNM"] = $row["store_name"];
						$_SESSION["GST"]=$row["gst_num"];					
						$_SESSION["full_name"] = $row["full_name"];
						$_SESSION["city"] = $row["city"];
						$_SESSION["verify"] = $row["status1"];
						$_SESSION["mobile"] = $row["phone"];
						$_SESSION["membership"] = $row["membership"];
						//echo $_SESSION["city"];
						
						//$conn->close();
						header('Location: TDash.php');
						//header('Location: index.php');

					// } else {
					// 	$_SESSION["vusername"] = $uname;			//	$_SESSION["username"] = null;
					// 	$_SESSION["full_name1"] = $row["full_name"];

					// 	$_SESSION["proimg1"] = $row["proImg"];					
					// 	$_SESSION["StoreNM1"] = $row["store_name"];
					// 	$_SESSION["GST1"]=$row["gst_num"];
					// 	$_SESSION["city1"] = $row["city"];
					// 	$_SESSION["verify"] = $row["status1"];
					// 	$_SESSION["verifycode"] = $row["verifycode"];
					// 	$_SESSION["mobile"] = $row["phone"];
					// 	$_SESSION["membership"] = $row["membership"];
					// 	header('Location: Tverify.php');
					// }


				
				} else {
					//$conn->close();
					header('Location: TLogin.php?var=Invalid Username or Password');
				}

						
				$conn->close();

				

?>