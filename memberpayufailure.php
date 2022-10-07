<?php

session_start();
/*
//------------------------------- Cookies
if(isset($_COOKIE["username"])) {

  $uname = $_COOKIE["username"];
  $first_name = $_COOKIE["first_name"];
  $mobile = $_COOKIE["mobile"];
  $user_id = $_COOKIE["user_id"];


  $_SESSION["username"] = $uname;						
  $_SESSION["first_name"] = $first_name;
  $_SESSION["mobile"] = $mobile;
  $_SESSION["user_id"] = $user_id;

}

*/

$email1=$_POST["email"];

require('db.php');
		
				$sql="SELECT * FROM seller_info WHERE username='$email1' " ;
				$result = $conn->query($sql);

				 if($row = $result->fetch_assoc())
				  {
				  				

                    $_SESSION["uname"] = $email1; 					$_SESSION["username"] = null;
                    $_SESSION["proimg"] = $row["proImg"];					
                    $_SESSION["StoreNM"] = $row["store_name"];
                    $_SESSION["GST"]=$row["gst_num"];					
                    $_SESSION["full_name"] = $row["full_name"];
                    $_SESSION["city"] = $row["city"];
                    $_SESSION["verify"] = $row["status1"];
                    $_SESSION["mobile"] = $row["phone"];
                    $_SESSION["membership"] = $row["membership"];
				
					}



						
				$conn->close();

				

?>




<?php 
include_once("header.php");
?>

<!-- Common Area Top ------------------ -->






<!-- Search Bar -->
<section class="page-title-section overlay" style="background: url(images/backgrounds/tra1.jpg) no-repeat center center;" >
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          
          <a class="h3 text-primary font-secondary" href="#">Payment Failure</a> <br />
          
          
          
        </div>
      </div>
    </div>
  </section>
  <!-- /Search Bar -->

  
  <!-- notice -->
  <section class="section">
    <div class="container">
      <div class="row">


        <div class="col-12">







<?php
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];

$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$salt="";

// Salt should be same Post Request 

If (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
  } else {
        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
         }
		 $hash = hash("sha512", $retHashSeq);
  
    // if ($hash != $posted_hash) {
      if ($hash == null || $hash == "" ) {
        echo "Invalid Transaction. Please try again";
		   } else {
         echo "<h3>Your order status is ". $status .".</h3><br>";
         echo "<h4>Your transaction id for this transaction is ".$txnid."";
         
      } 
?>

<!-- <br><br><a href='my_awarded.php' style="color: skyblue; " >Click here to proceed to Awarded Job Page.</a> -->
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>





            </div>
      </div>
    </div>
  </section>
  <!-- /notice -->


<!-- Common Area Bottom ----------------------- -->
<!-- footer -->
<?php 
include("footer.php");
?>
