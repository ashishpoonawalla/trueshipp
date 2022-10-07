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
		
				$sql="SELECT * FROM user_info WHERE email='$email1' " ;
				$result = $conn->query($sql);

				 if($row = $result->fetch_assoc())
				  {
				  				

						$_SESSION["username"] = $email1;
						$_SESSION["first_name"] = $row["first_name"];
						$_SESSION["mobile"] = $row["mobile"];
						$_SESSION["user_id"] = $row["user_id"];

				
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
        // echo "<h4>Your transaction id for this transaction is ".$txnid.". <br>You may try making the payment by clicking the link below.</h4><br><br>";
         
      } 
?>

<br><br><a href='my_jobs.php' style="color: skyblue; ">Click here to proceed to My Job Page.</a>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>





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
