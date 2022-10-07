<?php 
try{
  // echo "<br><br>";
  session_start();
}catch(Exception $e){

}
include("header.php");
?>

<!-- Common Area Top ------------------ -->





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
          
          for ($ccc = 1; $ccc <= 14; $ccc++){

            $ccc1 = (string)$ccc;
            if (file_exists("assets/images/".$pid1."_".$ccc.".png")){
            ?>
              
              <img class="mySlides" style="width:100%" src="assets/images/<?php echo $pid1; ?>_<?php echo $ccc1; ?>.png?t=<?php echo filemtime('assets/images/'.$pid1.'_'.$ccc1.'.png'); ?>" class="img-fluid w-100">
            
            <?php } 
            
            }
            ?>
            
            <!-- <?php
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
            <?php } ?> -->
            

        
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
    <a href="#" data-toggle="modal"  class="btn btn-info">Already Applied</a>
  <?php  
  } else {
  ?>
  <?php 
  if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] != $uidd){
  ?>





<?php

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
                  Your Budget: <input type="number" class="form-control" min="1" name="rate" required>
                </div>

            </div>
          </div>
          <input type="hidden" class="form-control" name="pid" value="<?php echo $pid1; ?>" >
                  <!--
                    <div class="form-group">
                      <textarea name="jobdetails" class="form-control mb-3" style="height: 100px;"placeholder="Cover Letter" required></textarea>
                  </div>  -->

                  
                <input type="checkbox" id="terms" name="terms" value="Terms" required>
                <label for="vehicle1" style="color: blue;"> I agree with the <a href='http://localhost/trueshipp/termsofuse.php'>Terms</a> 
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


  <!-- Related Job --------------------------------------- -->
        <div class="col-12 mt-4 order-4">
          <div class="border-bottom border-primary"></div>
        </div>
      </div>      
      <h3>Related Job</h3>

        <div class="row justify-content-center">

          <?php


          require('db.php');

          $sql1="SELECT * FROM products Where typepost='$typepost' AND product_id<>$pid1 AND  status1='Posted' ORDER BY product_id DESC Limit 12" ;

          $result1 = $conn->query($sql1);


          while($row1 = $result1->fetch_assoc())  {

          //  product_title, PCity, Pdate,   DCity,   DDate, product_cat, product_price, product_keywords, pweight, num_pack, product_desc, product_image, img2, img3, img4,  status1
            $pid1 =$row1['product_id'];
            $img1 =$row1['product_image'];
            $tit1 =$row1['product_title'];
            $pri1 =$row1['product_price'];
            $sale_amt =$row1['sale_amt'];

            $PCity =$row1['PCity'];
            $DCity =$row1['DCity'];
            $Pdate = $row1['PDate'];
            $typepost = $row1['typepost'];

            $mselfdriving =$row1['mselfdriving'];
            $dselfdriving =$row1['dselfdriving'];
            $dwithdriver =$row1['dwithdriver'];

                  $sql222="SELECT product_id FROM product_seller Where product_id=$pid1" ;
                  $result222 = $conn222->query($sql222);
            
                    $num222=0;
                    while($row222 = $result222->fetch_assoc())
                    {
                        $num222++;
                    }


          if ($typepost == "JOB"){
                      
          ?>

          <!-- ------------------------------ JOB -------------------- -->
          <div  onclick="javascript:window.location.href='Job_detail.php?jobid=<?php echo $pid1; ?>' " class="col-lg-3 col-sm-6 mb-5" style="margin: 0px; padding: 2px;">
          <div class="card p-0 border-primary rounded-0 hover-shadow">
            <img class="card-img-top rounded-0 watermark" style="height: auto; width: 100%; object-fit: cover;  height:180px; "src="assets/images/<?php echo $pid1; ?>_1.png?t=<?php echo filemtime('assets/images/'.$pid1.'_1.png'); ?>" alt="trueshipp">
            <!-- <img style="position:relative; top: -15px; width: 80px; margin-bottom: -25px;" src="images/logo50.png"> -->
            <div class="card-body">
              <a>    
              <ul class="list-inline mb-2" style="font-size: 11px;">
                <li class="list-inline-item" ><i class="ti-calendar mr-1 text-color"></i><?php echo $Pdate; ?></li>
                <li class="list-inline-item">₹. <?php echo $pri1; ?></li>
              </ul>
                  
              <p style="font-size: 11px; margin: 2px;">             
                  <img src="images/location3.png" style="width: 12px;"><?php echo $PCity; ?> to <?php echo $DCity; ?>
                  <br><?php echo $tit1; ?></p>
                  <a style="background-color:#FADCD9; color: Red; padding:5px; max-width: 150px; border-radius: 5px; font-size: 11px;" >
                    <?php echo $num222; ?> Applications 
                  </a> 
                </a>    
              
            </div>
          </div>
          </div>

          <?php }else if ($typepost == "BOOK"){  ?>

          <!-- ------------------------------ BOOK -------------------- -->

          <div onclick="javascript:window.location.href='vehicle_detail.php?jobid=<?php echo $pid1; ?>&psid=<?php echo $pid1; ?>' " class="col-lg-3 col-sm-6 mb-5" style="margin: 0px; padding: 2px;">
          <div class="card p-0 border-primary rounded-0 hover-shadow">
            <img class="card-img-top rounded-0 watermark" style="height: auto; width: 100%; object-fit: cover;  height:180px; "src="assets/images/<?php echo $pid1; ?>_1.png?t=<?php echo filemtime('assets/images/'.$pid1.'_1.png'); ?>" alt="trueshipp">
            <!-- <img style="position:relative; top: -15px; width: 80px; margin-bottom: -25px;" src="images/logo50.png"> -->
            <div class="card-body">
              <a>
              <ul class="list-inline mb-2" style="font-size: 11px;">
                <li class="list-inline-item">₹.<?php if ($dselfdriving > 0) {echo $dselfdriving;} else {echo $dwithdriver;} ?> per Day</li><br>
                <!--<li class="list-inline-item">Monthly <?php echo $mselfdriving; ?></li> -->
              </ul>
              <p class="card-title" style="font-size: 11px;  margin: 2px;">
                <img src="images/location3.png" style="width: 12px;"><?php echo $PCity; ?>
                <br><?php echo $tit1; ?>
              </p>

              <a style="background-color:#75E6DA; color: #05445E; padding:5px; max-width: 150px; border-radius: 5px; font-size:11px;" >
                <?php echo $num222; ?> Rent request 
              </a> 
              
              <!-- <a href="vehicle_detail.php?jobid=<?php echo $pid1; ?>" class="btn btn-info btn-sm">Book Vehicle</a> -->
              
              </a>
            </div>
          </div>
          </div>

          <?php }else{  ?>

          <!-- ------------------------------ SALE -------------------- -->

          <div onclick="javascript:window.location.href='vehicle_detail.php?jobid=<?php echo $pid1; ?>' " class="col-lg-3 col-sm-6 mb-5" style="margin: 0px; padding: 2px;">
          <div class="card p-0 border-primary rounded-0 hover-shadow">
          <img class="card-img-top rounded-0 watermark" style="height: auto; width: 100%; object-fit: cover;  height:180px; "src="assets/images/<?php echo $pid1; ?>_1.png?t=<?php echo filemtime('assets/images/'.$pid1.'_1.png'); ?>" alt="trueshipp">
          <!-- <img style="position:relative; top: -15px; width: 80px; margin-bottom: -25px;" src="images/logo50.png"> -->
          <div class="card-body">
            <a>
            <ul class="list-inline mb-2" style="font-size: 11px;">
              <li class="list-inline-item">₹.<?php echo $sale_amt; ?></li><br>
              <!--<li class="list-inline-item">Monthly <?php echo $mselfdriving; ?></li> -->
            </ul>
            <p class="card-title" style="font-size: 11px;  margin: 2px;">
              <img src="images/location3.png" style="width: 12px;"><?php echo $PCity; ?>
              <br><?php echo $tit1; ?>
            </p>

            <a style="background-color:#ffcc29; color: #05445E; padding:5px; max-width: 150px; border-radius: 5px; font-size:11px;" >
              <?php echo $num222; ?> Buy offers 
            </a> 
            
            <!-- <a href="vehicle_detail.php?jobid=<?php echo $pid1; ?>" class="btn btn-info btn-sm">Book Vehicle</a> -->
            
            </a>
          </div>
          </div>
          </div>


          <?php   
          }

          }
          ?>



        </div>



      </div>
    </div>

  </div>
</section>






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