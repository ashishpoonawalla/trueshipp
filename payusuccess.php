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



$_SESSION['pid2'] = $pid1 = $_POST["udf1"];
$_SESSION['sid2'] = $email80 = $sid2 = $_POST["udf2"];
$_SESSION['fnm2'] = $name80 = $fnm2 = $_POST["udf3"];
//$img2 = $_POST["timage"];
$_SESSION['tpri1111'] = $tpri1111 = $rat2 = $_POST["udf4"];
$_SESSION['tit1'] = $tit1 = $_POST["udf5"];

$fname80 = $_SESSION["first_name"];
$unme80  = $unm2 = $_SESSION["username"];

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



                     
          echo "<h3>Thank you. Your payment status is ". $status .".</h3><br>";
          echo "<h4>Your Transaction ID for this transaction is ".$txnid.".</h4><br>";
          echo "<h4>Payment of Rs. " . $amount . "</h4><br><br>";


//---------------------------------------------------- Update to Database
if ($txnid > 0 && $txnid < 100000000){

      $pid2 = $txnid ;

      require('db.php');
                  
      $sql="Update products SET status1='Awarded', paystatus='Funded' Where product_id=$pid1 " ;

      if ($conn->query($sql) === TRUE) {
      
      
      $sql1="SELECT * FROM products Where product_id=$pid1" ;

      $result1 = $conn->query($sql1);

      
        if($row1 = $result1->fetch_assoc())
        {
              //$pid1 =$row1['product_id'];
              $PCity =$row1['PCity'];
              $DCity =$row1['DCity'];
              //$Pdate = $row1['PDate'];
              //$theDate    = new DateTime($Pdate);
              //$stringDate = $theDate->format('d-M-Y');
              
              //$desc =$row1['product_desc'];
              //$desc1 = substr($desc,0,100);
              //$stat =$row1['status1'];
              $tpri1 =$row1['tprice'];
              $paystat1 =$row1['paystatus'];
              $dtl = "CR Fund - job id: $pid1 | $PCity - $DCity | Transaction ID: $txnid";
              
              $sql2="INSERT INTO transactions (username, amount, details, DRCR, status1, job_id ) Values('$unm2',$tpri1,'$dtl','CR',' ',$pid1)" ;
              //echo $sql2;
              $conn->query($sql2) ;

        }







//------------------ Send notifications ------------------------     
        try {

          $conn1 = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
          // set the PDO error mode to exception
          $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
          $ntype = "job";   
          $nmessage = "Job award";
          $stmt12 = $conn1->prepare("INSERT INTO notifications (nmessage, jobid, suid, sfnm, ruid, rfnm, ntype) 
          VALUES (:nmessage, :jobid, :suid, :sfnm, :ruid, :rfnm, :ntype) ");

          $stmt12->bindParam(':nmessage', $nmessage);
          $stmt12->bindParam(':jobid', $pid1);
          $stmt12->bindParam(':suid', $unme80 );
          $stmt12->bindParam(':sfnm', $fname80);
          $stmt12->bindParam(':ruid', $sid2);                
          $stmt12->bindParam(':rfnm', $fnm2);
          $stmt12->bindParam(':ntype', $ntype);
          $stmt12->execute();

      }
      catch(Exception $ex){

      }
      //------------------ Send email ------------------------
          //session_start();
          $_SESSION["eml_to"] = $email80;
          $_SESSION["eml_sub"] = "Job awarded : $tit1 ";
          $_SESSION["eml_mes"] = "Dear $name80, <br><br>$fname80 is awarded job to you. job#$pid1 <br>.
                                  <br><a target='_blank' href='https://trueshipp.com/my_job_detail.php?jobid=$pid1'>Click here to Open</a>";

          $_SESSION["eml_bcc"] = "trueshipp@gmail.com";

          include_once("emailsend.php");
                    
      //------------- End send email -------------------------


      }



//-------------------------------------------------------
    }

}
?>	


<br><br><a href='my_awarded.php' style="color: skyblue; " >Click here to proceed to Awarded Job Page.</a>
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
