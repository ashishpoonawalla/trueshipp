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
          
          <a class="h3 text-primary font-secondary" href="#">Payment Success</a> <br />
          
          
          
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


$date1 = date('Y-m-d'); 
$date2 = date("Y-m-d", strtotime("+6 month"));

if ($productinfo == "Gold 12 Months" || $productinfo == "Silver 12 Months") {
  $date2 = date("Y-m-d", strtotime("+12 month"));
}


// Salt should be same Post Request 

/*

If (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
  } else {
        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
         }

         */
        $retHashSeq ="";
		 $hash = hash("sha512", $retHashSeq);
       // if ($hash != $posted_hash) {
      if ($hash == null || $hash == "" ) {
	       echo "Invalid Transaction. Please try again";
		   } else {



                     
          echo "<h3>Thank You. Your payment status is ". $status .".</h3><br>";
          echo "<h4>Your Transaction ID for this transaction is ".$txnid.".</h4><br>";
          echo "<h4>We have received a payment of Rs. " . $amount . ". </h4><br><br>";


//---------------------------------------------------- Update to Database
if ($amount > 0 && $amount < 10000){

      $pid2 = $txnid ;
      //$unm2 = $_SESSION["username"] ;

      require('db.php');
                  
      $sql="Update seller_info SET membership='$productinfo', amountpaid=$amount, memberstart='$date1', memberend='$date2' Where username='$email' " ;

      if ($conn->query($sql) === TRUE) {
      
      
     
              $tpri1 =$amount;
              $paystat1 =$status;
              $dtl = "Payu Payment - Membership: $productinfo | $date1 - $date2 | Transaction ID: $txnid";
              
              $sql2="INSERT INTO transactions (username, amount, details, DRCR, status1, job_id ) Values('$unm2',$tpri1,'$dtl','Payu','Rs.$amount',$pid2)" ;
              //echo $sql2;
              $conn->query($sql2) ;

        }


}



//-------------------------------------------------------
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
