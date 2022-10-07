<?php

				
	    		$uname = ($_POST['uemail']);
        		$pass = ($_POST['upassword']);
				
				$pass = md5($pass )	;			
								
				require('db.php');
		
				$sql="SELECT * FROM user_info WHERE email='$uname' AND password='$pass' " ;
				$result = $conn->query($sql);

				if($row = $result->fetch_assoc())
				{
				  					
					session_start();
					$_SESSION["verify"] = $row["emailverify"];

					// if($row["emailverify"] == "Verify"){

						if ($row["status1"] == "Blocked")
						{
							header('Location: ULogin.php?var=Your account is blocked, please contact to trueshipp@gmail.com ');
							exit();
						}

						$_SESSION["username"] = $uname;							$_SESSION["uname"] = null;
						$_SESSION["first_name"] = $row["first_name"];
						$_SESSION["mobile"] = $row["mobile"];
						$_SESSION["user_id"] = $row["user_id"];
						$_SESSION["uimage"] = $row["uimage"];

				
						//setcookie("USER", $uname, time() + (86400 * 7), "/"); // 86400 = 1 day
										
						//$conn->close();
						header('Location: index.php');
					
											
					// } else {
					// 	$_SESSION["vusername"] = $uname;
					// 	$_SESSION["verifycode"] = $row["verifycode"];
					// 	$_SESSION["first_name1"] = $row["first_name"];
					// 	$_SESSION["mobile1"] = $row["mobile"];
					// 	$_SESSION["user_id1"] = $row["user_id"];
					// 	$_SESSION["uimage1"] = $row["uimage"];

					// 	header('Location: Uverify.php');
					// }


				
				} else {
					//$conn->close();
					header('Location: ULogin.php?var=Invalid Username or Password');
				}

						
				$conn->close();

				

?>