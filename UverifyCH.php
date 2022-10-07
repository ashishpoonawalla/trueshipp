<?php
require('db.php');
				session_start();
                $vuname = $_SESSION["vusername"] ;
				//$code11 = $_SESSION["verifycode"] ;
	    		$sql1="SELECT * FROM user_info WHERE email='$vuname' " ;
				$result1 = $conn->query($sql1);

				if($row1 = $result1->fetch_assoc())
				{
                    $code11 = $row1["verifycode"];
                }

	    		$ucode =  $_POST['code1'];



        		echo "$code11 - $ucode";
        		
                if ($ucode != $code11){
                    header('Location: Uverify.php?var=Invalid Code...');
                }else{

                    
                    require('db.php');
            
                    $sql="Update user_info SET emailverify='Verify' WHERE email='$vuname' " ;
                   
                    
                    if($conn->query($sql))
                    {
                        
                        //echo '<script>alert("Your account succesfully verified. login now...")</script>'; 
                        $_SESSION["username"] = $_SESSION["vusername"];			$_SESSION["uname"] = null;
						$_SESSION["first_name"] = $_SESSION["first_name1"];
						$_SESSION["mobile"] = $_SESSION["mobile1"];
						$_SESSION["user_id"] = $_SESSION["user_id1"];
						$_SESSION["uimage"] = $_SESSION["uimage1"];


                        //header('Location: ULogin.php?var=Veify Succesfully...');
                        header('Location: index.php');
                    } else {
                        //$conn->close();
                        header('Location: Uverify.php?var=Invalid Code... failed to update verification');
                    }

                            
                    $conn->close();

                }

?>