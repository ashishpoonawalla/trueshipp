<?php
require('db.php');

				session_start();
                $vuname = $_SESSION["vusername"] ;

                $sql1="SELECT * FROM seller_info WHERE username='$vuname' " ;
				$result1 = $conn->query($sql1);

				if($row1 = $result1->fetch_assoc())
				{
                    $code11 = $row1["verifycode"];
                }

	    		$ucode =  $_POST['code1'];



        		echo "$code11 - $ucode";
                if ($ucode != $code11){
                    header('Location: Tverify.php?var=Invalid Code...');
                }else{

                    
                    
            
                    $sql="Update seller_info SET emailverify='Verify' WHERE username='$vuname' " ;
                   
                    
                    if($conn->query($sql))
                    {
                        
                        //echo '<script>alert("Your account succesfully verified. login now...")</script>'; 
                        $_SESSION["uname"] = $_SESSION["vusername"];				$_SESSION["username"] = null;
						$_SESSION["proimg"] = $_SESSION["proimg1"];					
						$_SESSION["StoreNM"] = $_SESSION["StoreNM1"];
						$_SESSION["GST"]= $_SESSION["GST1"];					
						$_SESSION["full_name"] = $_SESSION["full_name1"];
						$_SESSION["city"] = $_SESSION["city1"];
						$_SESSION["verify"] = "Verify";


                        header('Location: TDash.php');
                    } else {
                        //$conn->close();
                        header('Location: Tverify.php?var=Invalid Code... failed to update verification');
                    }

                            
                    $conn->close();

                }

?>