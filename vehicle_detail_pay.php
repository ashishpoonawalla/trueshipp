<?php 
try{
  // echo "<br><br>";
  session_start();
}catch(Exception $e){

}
include("header.php");
?>

<!-- Common Area Top ------------------ -->




<!-- code for payumoney ------------------------------- -->
<?php

//---------- Use this for live 
$MERCHANT_KEY = "11K7xv";
$SALT = "IMDX6LJU";
$PAYU_BASE_URL = "https://secure.payu.in";			// For Production Mode

//---------- Use this for test mode
// $MERCHANT_KEY = "oZ7oo9";
// $SALT = "UkojH5TS";
// $PAYU_BASE_URL = "https://test.payu.in";		// For Sandbox Mode



$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  //|| empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>

<script>
   
    window.onload = function() {
      var hash = '<?php echo $hash ?>';
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>

<!-- code for payumoney ------------------------------- -->




<!-- page title -->

<?php
			
require('db.php');

      $limit = 10; 

      if (isset($_GET["jobid"] )) 
          {
          $jobid  = $_GET["jobid"]; 
          } 
      else 
         {
          $jobid=1; 
         };  

  $psid = $_GET['psid'];
  $txid = $_GET['txid'];
        //--------- Increase View by +1
        $sql214="Update products SET `viewcount` = `viewcount` + 1  WHERE product_id=$jobid" ;                 
        $conn->query($sql214);
        
             



        $sql1="SELECT * FROM products Where product_id=$jobid" ;
    //echo $sql1; 
        $result1 = $conn->query($sql1);

			
    if($row1 = $result1->fetch_assoc())
    {
      $pid1 =$row1['product_id'];
      $uidd =$row1['userID'];
      $userEmail =$row1['userEmail'];

      $product_title = $row1['product_title'];
      $product_price = $row1['product_price'];
      $product_desc = $row1['product_desc'];
      $product_cat = $row1['product_cat'];
        $paddress = $row1['PAddress'];
        $PCity = $DCity =  $row1['PCity'];
        $PCity11 = $DCity11 =  $row1['PCity'];

      $dtime = $row1['dtime'];
      $dfreekm = $row1['dfreekm'];            
        $doverkm = $row1['doverkm'];
        $dovertime = $row1['dovertime'];
        $dselfdriving = $row1['dselfdriving'];
        $dwithdriver = $row1['dwithdriver'];
        $dfueltype = $row1['dfueltype'];
        $dfuel = $row1['dfuel'];            
      $dgps = $row1['dgps'];
        $dpermission = $row1['dpermission'];
        $dinsurance = $row1['dinsurance'];

        $mtime = $row1['mtime'];
        $mfreekm = $row1['mfreekm'];
        $moverkm = $row1['moverkm'];
        $movertime = $row1['movertime'];
        $mselfdriving = $row1['mselfdriving'];
        $mwithdriver = $row1['mwithdriver'];

        
        $newused = $row1['newused'];
        $buyyear = $row1['buyyear'];
        $kmrun = $row1['kmrun'];
        $product_price = $row1['product_price'];
        $typepost = $row1['typepost'];

        $pick_lat = $row1['pick_lat'];
        $pick_lon = $row1['pick_lon'];
        $sale_amt = $row1['sale_amt'];
        $v_owner = $row1['v_owner'];

        $c_name = $row1['c_name'];
        $c_number = $row1['c_number'];

        $paystatus = $row1['paystatus'];
        $status1 = $row1['status1'];

            //$theDate    = new DateTime($dtime);
           // $stringDate = $theDate->format('Y-M-d');
            //list($year,$month,$day) = explode("-",$stringDate);

           // $st2 =  $day.'-'.$month.'-'.$year;

            $sql133="SELECT * FROM seller_info Where username='$userEmail'" ;
           
            $result133 = $conn->query($sql133);
       
             
            if($row133 = $result133->fetch_assoc())
            {
                 
                 $fnm11 =$row133['full_name'];
            }
            
            
            $sql144="SELECT * FROM product_seller Where psid=$psid" ;
           
            $result144 = $conn->query($sql144);
       
             
            if($row144 = $result144->fetch_assoc())
            {
                 
              $rate111 =$row144['rate'];
              $pay_status =$row144['pay_status'];
              $status2 =$row144['status2'];

            }


    }
				?>

<section class="page-title-section overlay" style="background: url(images/backgrounds/tra1.jpg) no-repeat center center;" >
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <ul class="list-inline custom-breadcrumb">
            
            <?php 
            if ($typepost == "BOOK"){
              ?>
          <li class="list-inline-item"><a class="h3 text-info font-secondary" href="#">
              <?php
              echo "Rent > ";
            }
            else{
              ?>
          <li class="list-inline-item"><a class="h3 text-warning font-secondary" href="#">
              <?php
              echo "Sale > ";
            }
            echo $product_title; 
            
            ?></a></li>
            <!--<li class="list-inline-item text-white h3 font-secondary nasted"><?php echo $PCity; ?> - <?php echo $PCity; ?></li> -->
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- /page title -->
  
  <!-- section -->
<section class="section-sm" style="background-color: #eee;">
    <div class="container">
      <div class="row">
      <div class="col-md-7 mb-4">
          <!-- Image  -->
          <!-- <img src="assets/images/<?php echo $pid1; ?>_1.png?t=<?php echo filemtime('assets/images/'.$pid1.'_1.png'); ?>" class="img-fluid w-100"> -->
          
                   
          <!-- slider --------------------------------------------------- -->


          <div class="w3-content w3-display-container">
            
            <?php
            if (file_exists("assets/images/".$pid1."_1.png")){
            ?>
            
              <img class="mySlides" style="width:100%" src="assets/images/<?php echo $pid1; ?>_1.png?t=<?php echo filemtime('assets/images/'.$pid1.'_1.png'); ?>" class="img-fluid w-100">
            
            <?php } ?>
            
            <?php
            if (file_exists("assets/images/".$pid1."_2.png")){
            ?>
              <img class="mySlides" style="width:100%" src="assets/images/<?php echo $pid1; ?>_2.png?t=<?php echo filemtime('assets/images/'.$pid1.'_2.png'); ?>" class="img-fluid w-100">
              <?php } ?>

            <?php
            if (file_exists("assets/images/".$pid1."_3.png")){
            ?>
              <img class="mySlides" style="width:100%" src="assets/images/<?php echo $pid1; ?>_3.png?t=<?php echo filemtime('assets/images/'.$pid1.'_3.png'); ?>" class="img-fluid w-100">
            <?php } ?>

            <?php
            if (file_exists("assets/images/".$pid1."_4.png")){
            ?>
              <img class="mySlides" style="width:100%" src="assets/images/<?php echo $pid1; ?>_4.png?t=<?php echo filemtime('assets/images/'.$pid1.'_4.png'); ?>" class="img-fluid w-100">
            <?php } ?>
            

          <!--
          <img class="mySlides" src="img_snowtops.jpg" style="width:100%">
          <img class="mySlides" src="img_lights.jpg" style="width:100%">
          <img class="mySlides" src="img_mountains.jpg" style="width:100%">
          <img class="mySlides" src="img_forest.jpg" style="width:100%">
          -->
          <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
          <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
          </div>

          <script>
          var slideIndex = 1;
          showDivs(slideIndex);

          function plusDivs(n) {
          showDivs(slideIndex += n);
          }

          function showDivs(n) {
          var i;
          var x = document.getElementsByClassName("mySlides");
          if (n > x.length) {slideIndex = 1}
          if (n < 1) {slideIndex = x.length}
          for (i = 0; i < x.length; i++) {
          x[i].style.display = "none";  
          }
          x[slideIndex-1].style.display = "block";  
          }
          </script>

          <!-- slider end--------------------------------------------------- -->


          
          
          
          <!-- <img style="position:relative; top: -19px; width: 100px;" src="images/logo50.png">   -->
          <br>Overview &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <img src="images/Location.png" ><?php echo $paddress.' ,'.$PCity; ?>
          <br><br>Description: <?php echo $product_desc; ?>
        </div>
        
        <div class="col-md-5 mb-4">
          <!-- course thumb -->
          <div id='myMap' style='width: 100%; height: 100%; min-height:250px; max-height: 380px; border: 1px #ddd solid '></div>
        
        </div>
        
      </div>



<!-- TAB  --------------------------------------- -->
     <div class="row">
        <div class="col-12 mb-4">
          

<?php

if ($typepost == "BOOK"){
?>
<!-- -------------------------------- Rent -------------------------- -->
<section class="container py-4" style="padding: 0px;">
    <div class="row">
        <div class="col-md-12">
            
            <ul id="tabs" class="nav nav-tabs">
                <li class="nav-item"><a href="" data-target="#home1" data-toggle="tab" class="nav-link small text-uppercase active">Per Day</a></li>
                <li class="nav-item"><a href="" data-target="#profile1" data-toggle="tab" class="nav-link small text-uppercase ">Per Month</a></li>
                <li class="nav-item"><a href="" data-target="#contact1" data-toggle="tab" class="nav-link small text-uppercase ">Contact</a></li>
                <!-- <li class="nav-item"><a href="" data-target="#messages1" data-toggle="tab" class="nav-link small text-uppercase">Reviews</a></li> -->
            </ul>
            
            <div id="tabsContent" class="tab-content" style="background-color: #fff; padding: 20px;">

                <div id="home1" class="tab-pane fade active show">
                             
                    <div class="col-12 px-0">
                        <div class="row">
                          <div class="col-md-4">
                            <ul class="list-styled">
                            <li>Time: <?php echo $dtime; ?></li>     

                            <li>With AC Par KM: <?php echo $doverkm; ?></li>
                           
                            <li>Vehicle with driver cost: <?php echo $dwithdriver; ?></li>
                            
                            <li>Fuel: <?php echo $dfuel; ?></li>
                            
                            <li>Permission to go out of town: <?php echo $dpermission; ?></li>
                            
                        </ul>
                        </div>

                        <div class="col-md-8">
                        <ul class="list-styled">   
                            <li>Non AC par KM: <?php echo $dfreekm; ?></li>      

                            <li>Self Driving Cost: <?php if ($dselfdriving == 0) { echo 'Not for Self Driving'; } else { echo $dselfdriving; } ?></li>

                            <li>Fuel Type: <?php echo $dfueltype; ?></li>
                           
                            <li>GPS: <?php echo $dgps; ?></li>
                            
                            <li>Insurance: <?php echo $dinsurance; ?></li>
                        </ul>
                        </div>
                        </div>
                    </div>


                </div>

                <div id="profile1" class="tab-pane fade ">
   
                    <div class="col-12 px-0">
                        <div class="row">
                          <div class="col-md-4">
                            <ul class="list-styled">
                            <!-- <li>Time: <?php echo $mtime; ?></li>      -->

                            <li>With AC Par KM: <?php echo $moverkm; ?></li>
                           
                            <li>Vehicle with driver cost: <?php echo $mwithdriver; ?></li>
                            
                            <li>Fuel: <?php echo $dfuel; ?></li>
                            
                            <li>Permission to go out of town: <?php echo $dpermission; ?></li>
                            
                        </ul>
                        </div>

                        <div class="col-md-8">
                        <ul class="list-styled">   
                            <li>Non AC par KM: <?php echo $mfreekm; ?></li>      

                            <li>Self Driving Cost: <?php if ($mselfdriving == 0) { echo 'Not for Self Driving'; } else { echo $mselfdriving; } ?></li>

                            <li>Fuel Type: <?php echo $dfueltype; ?></li>
                           
                            <li>GPS: <?php echo $dgps; ?></li>
                            
                            <li>Insurance: <?php echo $dinsurance; ?></li>
                        </ul>
                        </div>
                        </div>
                    </div>

                </div>

                <div id="contact1" class="tab-pane fade ">
   
                    <div class="col-12 px-0">
                        <div class="row">
                          <div class="col-md-4">
                            <ul class="list-styled">                            
                              <li>Name: <?php echo $c_name; ?></li>                            
                              <li>Contact num: <?php echo $c_number; ?></li> 
                            </ul>
                        </div>

                        
                    </div>

                </div>

                <div id="messages1" class="tab-pane fade">
                    <div class="list-group"><a href="" class="list-group-item d-inline-block"><span class="float-right badge badge-pill badge-dark">44</span> Message 1</a> <a href="" class="list-group-item d-inline-block"><span class="float-right badge badge-pill badge-dark">8</span> Message 2</a> <a href="" class="list-group-item d-inline-block"><span class="float-right badge badge-pill badge-dark">23</span> Message 3</a> <a href="" class="list-group-item d-inline-block text-muted">Message n..</a></div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

<?php
  }  else  {
?>
<!-- -------------------------------- Sale -------------------------- -->
<section class="container py-4" style="padding: 0px;">
    <div class="row">
        <div class="col-md-12">
            
            <ul id="tabs" class="nav nav-tabs">
                <li class="nav-item"><a href="" data-target="#details1" data-toggle="tab" class="nav-link small text-uppercase active">Details</a></li>
                <li class="nav-item"><a href="" data-target="#contact1" data-toggle="tab" class="nav-link small text-uppercase ">Contact</a></li>
                
            </ul>
            
            <div id="tabsContent" class="tab-content" style="background-color: #fff; padding: 20px;">
                <div id="details1" class="tab-pane fade active show">


                    <div class="col-12 px-0">
                        <div class="row">
                          <div class="col-md-4">
                            <ul class="list-styled">
                            <li>Condition: <?php echo $newused; ?></li>     

                            <li>Year of Buy: <?php echo $buyyear; ?></li>
                           
                            <li>Run km: <?php echo $kmrun; ?></li>

                            <li>Booking Amount: <?php echo $product_price; ?></li>            
                            
                            <li>Owner: <?php echo $v_owner; ?></li>   
                            
                          
                            
                        </ul>
                        </div>

                        <div class="col-md-8">
                        <ul class="list-styled">   
                                                  

                            <li>Fuel Type: <?php echo $dfueltype; ?></li>
                           
                            <li>GPS: <?php echo $dgps; ?></li>
                            
                            <li>Insurance: <?php echo $dinsurance; ?></li>

                            <li>Selling Amount: <?php echo $sale_amt; ?></li>
                        </ul>
                        </div>
                        </div>
                    </div>


                </div>

                <div id="contact1" class="tab-pane fade ">
   
                  <div class="col-12 px-0">
                      <div class="row">
                        <div class="col-md-4">
                          <ul class="list-styled">
                          
                            <li>Name: <?php echo $c_name; ?></li>
                          
                            <li>Contact num: <?php echo $c_number; ?></li>                            
                          
                          </ul>
                      </div>

                      
                  </div>

                </div>


               
            </div>
        </div>
    </div>
</section>


<?php } ?>

</div>  
</div>

<!-- Tab End ---------------------------------------------------------- -->

<!--  ------------------------------------------ Model Report  ------------------- -->

<a href="#" data-toggle="modal" data-target="#report33" class="" style="color: red; "><img src="images/report1.png" >Report</a> 
    
<div class="modal fade" id="report33" tabindex="-1"  role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div style="background-color: #ffe6e6; width:80%; margin-left: 10px; border: 1px solid #aaa;" class="modal-content rounded-5  p-4">
            
            <div class="modal-header border-0">
                AD ID: <?php echo $pid1; ?> report
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
      <?php
      
     // if (isset($_SESSION["uname"])){
      ?>
            
            <form action="report_send.php" method="POST" data-form-title="Job Bid"> 
              <input type="hidden" name="rpid" value="<?php echo $pid1; ?>">             
              <input type="hidden" name="ruserid" value="<?php echo $userEmail; ?>">
              <input type="hidden" name="rcategory" value="vehicle">
              <input type="hidden" name="rname" value="<?php echo $fnm11; ?>">
              <input type="hidden" name="stype" value="USER">
                       
              <div class="form-check">
                <input class="form-check-input" type="radio" name="rtype"  value="Fraud" checked>
                <label class="form-check-label" for="exampleRadios1">
                  Fraud
                </label>
              </div>              <br>

              <div class="form-check">
                <input class="form-check-input" type="radio" name="rtype" value="Duplicate ad">
                <label class="form-check-label" for="exampleRadios2">
                  Duplicate ad
                </label>
              </div>           <br>
                
              <div class="form-check">
                <input class="form-check-input" type="radio" name="rtype" value="Offensive post">
                <label class="form-check-label" for="exampleRadios2">
                  Offensive post
                </label>
              </div>         <br>
                
              <div class="form-check">
                <input class="form-check-input" type="radio" name="rtype" value="Error">
                <label class="form-check-label" for="exampleRadios2">
                  Error
                </label>
              </div>         <br>
                
              <div class="form-check">
                <input class="form-check-input" type="radio" name="rtype" value="Other">
                <label class="form-check-label" for="exampleRadios2">
                  Other
                </label>
              </div>         <br>
                
                
                <div class="form-group">                
                  <input type="text" max="100" class="form-control" name="rcomment" placeholder="comment" required>
                </div>
                
                
                <button type="submit" class="btn btn-default" style="border: 1px solid #aaa; " >Send</button>
                <button type="submit"  class="btn btn-default float-right" style="border: 1px solid #aaa; " data-dismiss="modal" aria-label="Close" >Cancel</button>
            </form>
           
            </div>

        </div>
    </div>
    
</div>

<!--  ------------------------------------------End Model Report------------------- -->




      <!-- course info -->
      <div class="row align-items-center ">
        <div class="col-xl-3 order-1 col-sm-6 mb-4 mb-xl-0">
          
        </div>
        <div class="col-xl-6 order-sm-3 order-xl-2 col-12 order-2">
          <ul class="list-inline text-xl-center">
           
            <li class="list-inline-item mr-4 mb-3 mb-sm-0">
              <div class="d-flex align-items-center">
                <!-- <i class="ti-wallet text-primary icon-md mr-2"></i>
                <div class="text-left">
                  <h6 class="mb-0">Budget</h6>
                  <p class="mb-0">From: Rs. <?php echo $pri1; ?></p>
                </div> -->
              </div>
            </li>
          </ul>
        </div>


        <?php 
						
						
				
		if(isset($_POST['pickupdate']) && isset($_POST['drivingexp']) ) {

              $daymonth = ($_POST['daymonth']);
              $driver = ($_POST['driver']);
              $pickupdate = ($_POST['pickupdate']);
              $drivingexp = ($_POST['drivingexp']);
              $yourage = ($_POST['yourage']);
              $rate = ($_POST['rate']);
              $pid1 = ($_POST['pid']);
             
              require('db.php');
		
              try {

                $conn1 = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
                // set the PDO error mode to exception
                $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                // prepare sql and bind parameters
                $stmt = $conn1->prepare("INSERT INTO product_seller(product_id, username, rate, full_name, daymonth, withdriver, pickupdate, drivingexp, yourage ) 
                VALUES (:product_id, :username, :rate, :full_name, :daymonth, :withdriver, :pickupdate, :drivingexp, :yourage) ");

                $stmt->bindParam(':product_id', $pid1);
                $stmt->bindParam(':username', $_SESSION["username"]);
                $stmt->bindParam(':rate', $rate);
                $stmt->bindParam(':full_name', $_SESSION["first_name"]);                
             
                $stmt->bindParam(':daymonth', $daymonth);                
                $stmt->bindParam(':withdriver', $driver);                
                $stmt->bindParam(':pickupdate', $pickupdate);                
                $stmt->bindParam(':drivingexp', $drivingexp);                
                $stmt->bindParam(':yourage', $yourage);                
                           
             
              
              
                if ($stmt->execute() === TRUE) {
                  
                  //echo '<script>alert("You have send booking request successfully.")</script>';
                  

                  $sql80="SELECT * FROM seller_info Where username='$userEmail' " ;
                  //echo $sql1; 
                  $result80 = $conn->query($sql80);
                  
                  if($row80 = $result80->fetch_assoc())
                    {
                      $name80 =$row80['full_name'];
                      $email80 =$userEmail;
                    }


                    $uname80 = $_SESSION["username"] ; 	
                    $fname80 = $_SESSION["first_name"];

                      //------------------ Send notifications ------------------------      
                      $ntype = "vehicle";   
                      $nmessage = "New booking request";
                      $stmt12 = $conn1->prepare("INSERT INTO notifications (nmessage, jobid, suid, sfnm, ruid, rfnm, ntype) 
                      VALUES (:nmessage, :jobid, :suid, :sfnm, :ruid, :rfnm, :ntype) ");

                      $stmt12->bindParam(':nmessage', $nmessage);
                      $stmt12->bindParam(':jobid', $pid1);
                      $stmt12->bindParam(':suid', $_SESSION["username"]);
                      $stmt12->bindParam(':sfnm', $_SESSION["first_name"]);
                      $stmt12->bindParam(':ruid', $email80);                
                      $stmt12->bindParam(':rfnm', $name80);
                      $stmt12->bindParam(':ntype', $ntype);
                      $stmt12->execute();


                      echo '<script>alert("You have bid successfully on this job.")</script>';



                  //------------------ Send email ------------------------
                  //session_start();
                  $_SESSION["eml_to"] = $email80;

                  $_SESSION["eml_sub"] = "Booking request on your vehicle: $tit1 ";

                  $_SESSION["eml_mes"] = "Dear $name80, <br><br>$fname80 is request booking on your vehicle for Rs. $rate from date: $pickupdate<br>
                                          Vehicle: $tit1.
                                          <br><a target='_blank' href='https://trueshipp.com/my_job_detail.php?jobid=$pid1'>Click here to Open</a>";

                  $_SESSION["eml_bcc"] = "trueshipp@gmail.com";

                  include_once("emailsend.php");
                  
                  //------------- End send email -------------------------
                                    
                } else {
                  echo '<script>alert("Warning! Error bidding on this job.")</script>';
                    
                  //echo "Error Inserting record: " . $conn1->error;
                }
                
                
                //$stmt->close();
                 
                //echo "New records created successfully";
                } catch(PDOException $e) {
                //echo "Error: " . $e->getMessage();
                }
                $conn1 = null;
              
              
              

					}else{
						
					
						
						?>




<!-- ------------------------------- Model Button ------------------- -->
<div class="col-xl-3 text-left order-sm-2 order-3 order-xl-3 col-sm-6 mb-4 mb-xl-0">


  <?php
  $uname1= "";
  if(isset($_SESSION["username"])){
  $uname1= $_SESSION["username"];
  }
  require('db.php');

  $sql="SELECT * FROM product_seller WHERE username='$uname1' AND product_id=$pid1 " ;
  $result = $conn->query($sql);

  if($row = $result->fetch_assoc())
  {
  ?>
    
    


<!-- --------------------- payumoney  Code  Start------     -->

<?php if($formError) { ?>
	
    <span style="color:red">Please fill all mandatory fields.</span>
    <br/>
    <br/>
  <?php } 
  
  $pid111 = $txid;
  
 
    $path1 = "http://localhost/trueshipp/" ;


if ($pay_status == "no"){
?> 
  
   <form action="<?php echo $action; ?>" method="post" name="payuForm">
        <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
        <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
        <input type="hidden" name="txnid" value="<?php echo $pid111 ?>" />
  
        <!-- ------------- PayuCode --------- -->

        <!-- <input type="hidden" name="amount" value="1" /> -->
        <input type="hidden" name="amount" value="<?php echo  $product_price; ?>" />

        <input type="hidden" name="firstname" id="firstname" value="<?php echo $_SESSION['first_name']; ?>" />
        <input type="hidden" name="email" id="email" value="<?php echo $_SESSION['username']; ?>" />
        <input type="hidden" name="phone" value="<?php echo $_SESSION['mobile']; ?>" />
        
        <input type="hidden" name="productinfo" value="<?php echo $tit1; ?>" />
        <input type="hidden" name="surl" value="<?php echo $path1; ?>vehiclepayusuccess.php" />
        <input type="hidden" name="furl" value="<?php echo $path1; ?>vehiclepayufailure.php" size="64" />
        <!-- <input type="hidden" name="service_provider" value="payu_paisa" size="64" /> -->
         
        <!--  Optional Parameters-- -->
        <input type="hidden" name="lastname" id="lastname" value="<?php echo (empty($posted['lastname'])) ? '-' : $posted['lastname']; ?>" />
        <input type="hidden" name="address1" value="<?php echo (empty($posted['address1'])) ? '-' : $posted['address1']; ?>" />
        <input type="hidden" name="address2" value="<?php echo (empty($posted['address2'])) ? '-' : $posted['address2']; ?>" />
        <input type="hidden" name="city" value="<?php echo (empty($posted['city'])) ? '-' : $posted['city']; ?>" />
        
        <input type="hidden" name="state" value="<?php echo (empty($posted['state'])) ? '-' : $posted['state']; ?>" />
        <input type="hidden" name="country" value="<?php echo (empty($posted['country'])) ? '-' : $posted['country']; ?>" />
        <input type="hidden" name="zipcode" value="<?php echo (empty($posted['zipcode'])) ? '-' : $posted['zipcode']; ?>" />
        
        <input type="hidden" name="udf1" value="<?php echo $pid1 ?>" />
        <input type="hidden" name="udf2" value="<?php echo $jobid; ?>" />
        <input type="hidden" name="udf3" value="<?php echo $psid; ?>" />
        <input type="hidden" name="udf4" value="<?php echo (empty($posted['udf4'])) ? '-' : $posted['udf4']; ?>" />
        <input type="hidden" name="udf5" value="<?php echo (empty($posted['udf5'])) ? '-' : $posted['udf5']; ?>" />
        <input type="hidden" name="pg" value="<?php echo (empty($posted['pg'])) ? '-' : $posted['pg']; ?>" />
        
  <?php
  if ($typepost == "BOOK" ){
  ?>

    <input class="btn btn-sm btn-warning" style="border: 1px solid #aaa; border-radius: 5px;" type="submit" value="Book Now Rs. <?php echo  $rate111; ?>" />
  

  <?php
  }else{
  ?>

    <input class="btn btn-sm btn-warning" style="border: 1px solid #aaa; border-radius: 5px;" type="submit" value="Pay Rent Rs. <?php echo  $product_price; ?>" />
  
  <?php
  }
  ?>  

         
         
      </form>
   
  <?php

  }else if ($pay_status == "Funded"){

    if ($status2 == "Cancel - Pending" ){
      ?>
        <span class="btn-sm " style="color: red; margin-top: 5px; margin-right: 15px;">Cancel - Pending</span>
      <?php
    }else if ($status2 == "Cancel" ){
      ?>
        <span class="btn-sm " style="color: red; margin-top: 5px; margin-right: 15px;">Cancel</span>
      <?php
    }else{

  ?>
    <a href="vehicle_release.php?jobid=<?php echo $pid1; ?>&psid=<?php echo $psid; ?>" class="btn btn-sm btn-success" style="border: 1px solid #aaa; border-radius: 5px; color: white; " onclick="return confirm('Are you sure you want to release payment? Note- you will not get refund after this step. confirm it.');">Funded, Release fund</a><br><br>
    <a href="vehicle_cancel.php?jobid=<?php echo $pid1; ?>&psid=<?php echo $psid; ?>" class="btn btn-sm btn-danger" style="border: 1px solid #aaa; border-radius: 5px; color: white; " onclick="return confirm('Are you sure you want to cancel this booking? Note- It will take min 3 days to confirm from user to job booking.');">Cancel & Refund</a>
  

  <?php
    }

  }else{

  ?>

    <a class="btn btn-sm btn-default" style="border: 1px solid #aaa; border-radius: 5px;  ">Payment Released</a><br><br>
    
  <?php
    }
  ?>
  <!-- --------------------- payumoney  Code End------     -->











  <?php  
  } else {
  ?>
  <?php 
  if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] != $uidd){

  if ($typepost == "BOOK"){
?>
    <!--  ------------------------------------------ RENT  ------------------- -->
    <a href="#" data-toggle="modal" data-target="#jobModal"class="btn btn-info">Booking request</a>


     <div class="modal fade" id="jobModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content rounded-5 border-0 p-4">
                

                <div class="modal-header border-0">
                    <h3>Booking</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
      <?php
          
        if (isset($_SESSION["username"])){
          ?>





        <form action="#" method="POST" data-form-title="Job Bid">              
                  
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="daymonth" value="day" checked>Per day
                  </label>
                  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="daymonth" value="month" >Per month
                  </label>
                </div>
                <br>

                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="driver" value="No" checked>Without driver
                  </label>
                  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="driver" value="Yes">With driver
                  </label>
                </div>
                <br>

          
          <div class="row">
            <div class="col-md-6">

                <div class="form-group">
                  Pickup Date: <input type="date" class="form-control" name="pickupdate" required>
                </div>
                
                <div class="form-group">
                  Driving Experience: <input type="text" class="form-control" name="drivingexp" placeholder="10 years" required>
                </div>
            </div>
          

          
            <div class="col-md-6">

                <div class="form-group">
                  Your Age: <input type="text" class="form-control" name="yourage" placeholder="30 years" required>
                </div>
                
                <div class="form-group">
                  Your Budget: <input type="number" class="form-control" name="rate" required>
                </div>

            </div>
          </div>
          <input type="hidden" class="form-control" name="pid" value="<?php echo $pid1; ?>" >
                  <!--
                    <div class="form-group">
                      <textarea name="jobdetails" class="form-control mb-3" style="height: 100px;"placeholder="Cover Letter" required></textarea>
                  </div>  -->

                  
                <input type="checkbox" id="terms" name="terms" value="Terms" required>
                <label for="vehicle1"> I agree with the <a href='http://localhost/trueshipp/termsofuse.php'>Terms</a> 
                & <a href='http://localhost/trueshipp/privacy.php'>Privacy</a> of Trueshipp</label><br>
                
                  <button type="submit" class="btn btn-info"  >Booking request send</button>

        </form>




                    <?php
                      
                    }else{
                      ?>

                        <div class="alert alert-danger" role="alert">
                          Warning! login as user to book this vehicle.
                        </div>
                        
                      <?php
                    }
                    ?>
                
              
                </div>



            </div>
        </div>
    </div>

  

<?php

}else{
?>
    <!--  ------------------------------------------ SALE ------------------- -->
     <a href="#" data-toggle="modal" data-target="#saleModal"class="btn btn-warning">Buy request</a>

     
    <!-- Job Apply Modal -->
    <div class="modal fade" id="saleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content rounded-5 border-0 p-4">
                

                <div class="modal-header border-0">
                    <h3>Buy Rrequest</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body float-left">
                    
      <?php
          
        if (isset($_SESSION["username"])){
          ?>


        <form action="#" method="POST" data-form-title="Job Bid">    
            <input type="hidden" class="form-control" name="daymonth"  value="none" >
            <input type="hidden" class="form-control" name="driver"  value="none" >
            <input type="hidden" class="form-control" name="pickupdate"  value="none" >
            <input type="hidden" class="form-control" name="drivingexp"  value="none" >
            <input type="hidden" class="form-control" name="yourage"  value="none" >
                           
              <div class="form-group">
                Your Budget: 
                <input type="number" class="form-control" name="rate" required>
              </div>

           
              <input type="hidden" class="form-control" name="pid" value="<?php echo $pid1; ?>" >
                              
              <input type="checkbox" id="terms" name="terms" value="Terms" required>
              <label for="vehicle1"> I agree with the <a href='http://localhost/trueshipp/termsofuse.php'>Terms</a> 
              & <a href='http://localhost/trueshipp/privacy.php'>Privacy</a> of Trueshipp</label><br>
                
              <button type="submit" class="btn btn-info"  >Buy request send</button>

        </form>




                    <?php
                      
                    }else{
                      ?>

                        <div class="alert alert-danger" role="alert">
                          Warning! login as user to book this vehicle.
                        </div>
                        
                      <?php
                    }
                    ?>
                
              
                </div>



            </div>
        </div>
    </div>

    <!--  ------------------------------------------End Model If Transporeter Verified ------------------- -->




<?php
}
?>





<?php
  }

}
 
$conn->close();
?>
      
</div>






<!--  ------------------------------------------ Model If Transporeter NOT Verified ------------------- -->

<!-- Job Apply Modal -->
<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-5 border-0 p-4" style="margin-top: 100px;">
            
          <!--
            <div class="modal-header border-0">
                <h3>Warning!</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            -->
            <div class="modal-body" style="text-align: center;">
                
  

                    <img src="images/Sad-E1.png" style="width: 70px; text-align: center;" ><br><br>
                    <h4 style="text-align: center;">Get your account verified with True Shipp</h4>
                    
                    <a href="http://localhost/trueshipp/pages/transporter/setting.php" >
                    <img src="images/Click-Here1.png" style="width: 150px; ">
                    </a>
            </div>
        </div>
    </div>
</div>

<!--  ------------------------------------------End Model If Transporeter NOT Verified ------------------- -->


                <?php   }  ?>


        <!-- border -->
        <div class="col-12 mt-4 order-4">
          <div class="border-bottom border-primary"></div>
        </div>
      </div>      

      </div>
    </div>
  </section>
  <!-- /section -->






<!-- Common Area Bottom ----------------------- -->
<!-- footer -->
<?php 
include("footer.php");
?>


<script type='text/javascript'>
            function loadMapScenario() {
                var map = new Microsoft.Maps.Map(document.getElementById('myMap'), {
                    /* No need to set credentials if already passed in URL */
                    center: new Microsoft.Maps.Location(<?php echo $pick_lat; ?>,<?php echo $pick_lon; ?>),
                    zoom: 12
                });
                Microsoft.Maps.loadModule('Microsoft.Maps.Directions', function () {
                    var directionsManager = new Microsoft.Maps.Directions.DirectionsManager(map);
                    // Set Route Mode to driving
                    directionsManager.setRequestOptions({ routeMode: Microsoft.Maps.Directions.RouteMode.driving });
                    //var waypoint1 = new Microsoft.Maps.Directions.Waypoint({ address: '<?php echo $PCity11; ?>' });
                    //var waypoint2 = new Microsoft.Maps.Directions.Waypoint({ address: '<?php echo $DCity11; ?>' });
                   var waypoint1 = new Microsoft.Maps.Directions.Waypoint({address: '.',  location: new Microsoft.Maps.Location(<?php echo $pick_lat; ?>, <?php echo $pick_lon; ?>) });
                   var waypoint2 = new Microsoft.Maps.Directions.Waypoint({address: '.',  location: new Microsoft.Maps.Location(<?php echo $pick_lat ?>, <?php echo $pick_lon; ?>) });
                    directionsManager.addWaypoint(waypoint1);
                    directionsManager.addWaypoint(waypoint2);
                    // Set the element in which the itinerary will be rendered
                    directionsManager.setRenderOptions({ itineraryContainer: document.getElementById('printoutPanel') });
                    directionsManager.calculateDirections();
                });
                
            }
        </script>
        <script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?key=Alt4pMIelko3RclrRrokx2IhE1sFyoZen-iWXct9urb5G61DUVjMPPW8DzehK9fK&callback=loadMapScenario' async defer></script>




</body>
</html>