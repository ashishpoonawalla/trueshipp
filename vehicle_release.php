<?php

session_start();

include_once("header.php");
?>

<!-- Common Area Top ------------------ -->





<!-- Search Bar -->
<section class="page-title-section overlay" style="background: url(images/backgrounds/tra1.jpg) no-repeat center center;" >
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          
          <a class="h3 text-primary font-secondary" href="#">Fund Released Status</a> <br />
          
          
          
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
$pid2 = $_REQUEST['jobid'];
$psid11 = $_REQUEST['psid'];

$unm2 = $email = $_SESSION["username"] ;


$sql1="SELECT * FROM products Where product_id=$pid2" ;
$result1 = $conn->query($sql1);
      
        if($row1 = $result1->fetch_assoc())
        {
            $pid1 = $pid2 = $row1['product_id'];
            $productinfo= $tit1 = $row1['product_title'];
            $PCity = $row1['PCity'];
            $userEmail = $row1['userEmail'];
            $typepost = $row1['typepost'];
            
            $status1=$row1["status1"];
            $amount=$row1["product_price"];
            
            //---------------------------------------------------- Update to Database
           

            require('db.php');         
            
            $sql8="Update product_seller SET pay_status='Fund Released' Where psid=$psid11 " ;
            $conn->query($sql8);


            $sql="Update products SET paystatus='Fund Released', status1='Delivered' Where product_id=$pid2 AND typepost='SALE' " ;

            $conn->query($sql);
          
      

            //------ ---------------- Release Fund - ------- USer Account ------
            
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
                        $_SESSION["eml_sub"] = "Payment released : $tit1 ";
                        $_SESSION["eml_mes"] = "Dear $fnm2, <br><br>You funded to $tfnm. job#$pid1 -  $tit1 - $PCity <br>.";
                        $_SESSION["eml_bcc"] = "trueshipp@gmail.com";

                        include_once("emailsend.php");
                          
                    //------------------ Send email Transporter ------------------------
                        //session_start();
                    
                        $_SESSION["eml_to"] = $tunm;
                        $_SESSION["eml_sub"] = "Payment released : $tit1 ";
                        $_SESSION["eml_mes"] = "Dear $tfnm, <br><br>$fnm2 funded to you. job#$pid1 -  $tit1 - $PCity <br>.";
                        $_SESSION["eml_bcc"] = "trueshipp@gmail.com";

                        include_once("emailsend.php");
                                  
                    //------------- End send email -------------------------

                          

            }


        }




?>	


<br><br><a style="color: skyblue; " href='my_rent.php' >Click here to proceed to vehicle lists Page.</a>
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
