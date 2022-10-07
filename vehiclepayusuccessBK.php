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
$udf1 = $pid2 =$_POST["udf1"];
$udf2 = $_POST["udf2"];
$udf3 = $psid11 = $_POST["udf3"];
$salt="";

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
          echo "<h4>Amount of Rs. " . $amount . ". </h4><br><br>";


//---------------------------------------------------- Update to Database

      $unm2 = $_SESSION["username"] ;

      require('db.php');         
      
      $sql8="Update product_seller SET pay_status='yes' Where psid=$psid11 " ;
      $conn->query($sql8);


      $sql="Update products SET paystatus='Fund Released' Where product_id=$pid2 " ;

      if ($conn->query($sql) === TRUE) {
      
      
        $sql1="SELECT * FROM products Where product_id=$pid2" ;
        $result1 = $conn->query($sql1);
      
        if($row1 = $result1->fetch_assoc())
        {
              $pid1 = $pid2 = $row1['product_id'];
              $tit1 = $row1['product_title'];
              $PCity = $row1['PCity'];
              $userEmail = $row1['userEmail'];
              $typepost = $row1['typepost'];
             

              //------ ---------------- CR transaction - ------- USer Account ------
              $tpri1 = $amount;
              $paystat1 = "Success";
              $dtl = "CR Fund - job id: $pid2 | $tit1 - $PCity | Transaction ID: $txnid";
              
              $sql2="INSERT INTO transactions (username, amount, details, DRCR, status1, job_id ) Values('$unm2',$tpri1,'$dtl','CR',' ',$pid2)" ;
              //echo $sql2;
              $conn->query($sql2) ;



              $unm2 = $_SESSION["username"] ;
              $fnm2 = $_SESSION["first_name"] ;

              require('db.php');
                  
                                
                  
              $sql17="SELECT * FROM seller_info Where username='$userEmail'" ;

              $result17 = $conn->query($sql17);

                  
              if($row17 = $result17->fetch_assoc())
              {
                      
                      $tunm =$row17['username'];
                      $tfnm = $row17['full_name'];
                      $tpri1 =$amount;
                      $paystat1 ="Success";


                      //--------------------- Amount DR from sender
                      $dtl = "-DR Fund Release - job id: $pid2 | $tit1 - $PCity";
                      $sql2="INSERT INTO transactions (username, amount, details, DRCR, status1, job_id ) Values('$unm2',$tpri1,'$dtl','DR',' ',$pid2)" ;
                      //echo $sql2;
                      $conn->query($sql2) ;

                      $tamt = ($tpri1 * 93) / 100;
                      $aamt = ($tpri1 * 7) / 100;


                      //--------------------- Amount CR to reciever
                      $dtl = "CR Fund Release from - job id: $pid2 | $tit1 - $PCity";
                      $sql2="INSERT INTO transactions (username, amount, details, DRCR, status1, job_id ) Values('$tunm',$tamt,'$dtl','CR',' ',$pid2)" ;
                      //echo '<hr>'.$sql2;
                      $conn->query($sql2) ;


                      //--------------------- Amount CR to Admin
                      $dtl = "CR to ADMIN Fund Release - job id: $pid2 | $tit1 - $PCity | 7% commission.";
                      $sql2="INSERT INTO transactions (username, amount, details, DRCR, status1, job_id ) Values('Admin',$aamt,'$dtl','CR',' ',$pid2)" ;
                      //echo '<hr>'.$sql2;
                      $conn->query($sql2) ;




                          //------------------ Send notifications USER------------------------     
                          $ntype = $typepost;   
                          $nmessage = "Fund released";

                          $sql11="INSERT INTO notifications (nmessage, jobid, suid, sfnm, ruid, rfnm, ntype) 
                                                  VALUES ('$nmessage', $pid2, '$unm2', '$fnm2', '$tunm', '$tfnm', '$ntype') ";

                          $conn->query($sql11);


                          //------------------ Send notifications TRANSPORTER------------------------     
                          $ntype = $typepost;   
                          $nmessage = "Fund released";

                          $sql11="INSERT INTO notifications (nmessage, jobid, suid, sfnm, ruid, rfnm, ntype) 
                                                  VALUES ('$nmessage', $pid2,  '$tunm', '$tfnm', '$unm2', '$fnm2', '$ntype') ";

                          $conn->query($sql11);
                          //------------------ Send notifications End------------------------  


      //------------------ Send email User ------------------------
          //session_start();
      
          $_SESSION["eml_to"] = $unm2;
          $_SESSION["eml_sub"] = "Payment success : $tit1 ";
          $_SESSION["eml_mes"] = "Dear $fnm2, <br><br>You paid to $tfnm. job#$pid1 -  $tit1 - $PCity <br>.";
          $_SESSION["eml_bcc"] = "trueshipp@gmail.com";

          include_once("emailsend.php");
            
      //------------------ Send email Transporter ------------------------
          //session_start();
      
          $_SESSION["eml_to"] = $tunm;
          $_SESSION["eml_sub"] = "Payment success : $tit1 ";
          $_SESSION["eml_mes"] = "Dear $tfnm, <br><br>$fnm2 paid to you. job#$pid1 -  $tit1 - $PCity <br>.";
          $_SESSION["eml_bcc"] = "trueshipp@gmail.com";

          include_once("emailsend.php");
                    
      //------------- End send email -------------------------

                  

              }
              else
              {
                  echo "Error Inserting record: " . $conn->error;
              }




        }


      }


//-------------------------------------------------------
    }


?>	


<br><br><a style="color: skyblue; " href='vehicle_detail.php?jobid=<?php echo $pid2; ?>' >Click here to proceed to vehicle details Page.</a>
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
