<?php 
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
			  	
			  	$img1 =$row1['product_image'];
          $tit1 =$row1['product_title'];
          $pri1 =$row1['product_price'];

          $PCity =$row1['PCity'];
          $DCity =$row1['DCity'];
          $Pdate = $row1['PDate'];
          $Ddate = $row1['DDate'];

          $cat = $row1['product_cat'];
          $key = $row1['product_keywords'];
          $wei = $row1['pweight'];
          $num = $row1['num_pack'];

          $theDate    = new DateTime($Pdate);
          $stringDate = $theDate->format('Y-M-d');
          list($year,$month,$day) = explode("-",$stringDate);

          $st2 =  $day.'-'.$month.'-'.$year;
          
          $desc =$row1['product_desc'];
          $desc1 = substr($desc,0,100);
    
          $typepost = $row1['typepost'];

          $sql133="SELECT * FROM user_info Where user_id=$uidd" ;
           
            $result133 = $conn->query($sql133);
       
             
            if($row133 = $result133->fetch_assoc())
            {
                 
                 $fnm11 = $row133['first_name'];
                 $userEmail = $row133['email'];
            }
        }
				?>

<section class="page-title-section overlay" style="background: url(images/backgrounds/tra1.jpg) no-repeat center center;" >
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <ul class="list-inline custom-breadcrumb">
            <li class="list-inline-item"><a class="h3 text-primary font-secondary" href="#">Job Detail</a></li>
            <li class="list-inline-item text-white h3 font-secondary nasted">
            <img src="images/Location2.png" style="height: 30px; margin-top: -8px;"><?php echo $PCity; ?> - <?php echo $DCity; ?></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- /page title -->
  
  <!-- section -->
<section class="section-sm">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mb-4">
         
         
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
            
            </div>

            <div class="col-md-6 mb-4">
              <!-- course thumb -->
              <div id='myMap' style='width: 100%; height: 100%; min-height:250px;'></div>
            </div>

            
          </div>

        

          <!-- course info -->
          <div class="row align-items-center ">
            <div class="col-xl-3 order-1 col-sm-6 mb-4 mb-xl-0">
              <h3 ><?php echo $st2; ?></h3>
            </div>
            <div class="col-xl-6 order-sm-3 order-xl-2 col-12 order-2">
              <ul class="list-inline text-xl-center">
                <!--
                <li class="list-inline-item mr-4 mb-3 mb-sm-0">
                  <div class="d-flex align-items-center">
                    <i class="ti-alarm-clock text-primary icon-md mr-2"></i>
                    <div class="text-left">
                      <h6 class="mb-0">DURATION</h6>
                      <p class="mb-0">4 Days</p>
                    </div>
                  </div>
                </li>
          -->
                <li class="list-inline-item mr-4 mb-3 mb-sm-0">
                  <div class="d-flex align-items-center">
                    <i class="ti-wallet text-primary icon-md mr-2"></i>
                    <div class="text-left">
                      <h6 class="mb-0">Budget</h6>
                      <p class="mb-0">From: Rs. <?php echo $pri1; ?></p>
                    </div>
                  </div>
                </li>
              </ul>
            </div>


            <?php 
                
                
                
              if(isset($_POST['jobbid']) && isset($_POST['jobdetails']) ) {

                  $jobbid = ($_POST['jobbid']);
                  $jobdetails = ($_POST['jobdetails']);
                
                  require('db.php');
        
                  try {

                    $conn1 = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
                    // set the PDO error mode to exception
                    $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    // prepare sql and bind parameters
                    $stmt = $conn1->prepare("INSERT INTO product_seller(product_id, username, rate,  full_name, proImg, coverLetter) 
                    VALUES (:product_id, :username, :rate, :full_name, :proImg, :coverLetter) ");

                    $stmt->bindParam(':product_id', $pid1);
                    $stmt->bindParam(':username', $_SESSION["uname"]);
                    $stmt->bindParam(':rate', $jobbid);
                    $stmt->bindParam(':full_name', $_SESSION["full_name"]);                
                    $stmt->bindParam(':proImg', $_SESSION["proimg"]);
                    $stmt->bindParam(':coverLetter', $jobdetails);              
                  
                  
                    if ($stmt->execute() === TRUE) {
                      
                                
                      
              //------------------ Get reciever info ------------------------
                      $sql80="SELECT * FROM user_info Where user_id=$uidd" ;
                      //echo $sql1; 
                      $result80 = $conn->query($sql80);
                      
                      if($row80 = $result80->fetch_assoc())
                        {
                          $name80 =$row80['first_name'];
                          $email80 =$row80['email'];
                        }
                        $uname80 = $_SESSION["uname"] ; 	
                        $fname80 = $_SESSION["full_name"];

                        
              //------------------ Send notifications ------------------------      
                        $ntype = "job";   
                        $nmessage = "New bid";
                        $stmt12 = $conn1->prepare("INSERT INTO notifications (nmessage, jobid, suid, sfnm, ruid, rfnm, ntype) 
                        VALUES (:nmessage, :jobid, :suid, :sfnm, :ruid, :rfnm, :ntype) ");
      
                        $stmt12->bindParam(':nmessage', $nmessage);
                        $stmt12->bindParam(':jobid', $pid1);
                        $stmt12->bindParam(':suid', $_SESSION["uname"]);
                        $stmt12->bindParam(':sfnm', $_SESSION["full_name"]);
                        $stmt12->bindParam(':ruid', $email80);                
                        $stmt12->bindParam(':rfnm', $name80);
                        $stmt12->bindParam(':ntype', $ntype);
                        $stmt12->execute();


                        echo '<script>alert("You have bid successfully on this job.")</script>';


              //------------------ Send email ------------------------
                      //session_start();
                      $_SESSION["eml_to"] = $email80;

                      $_SESSION["eml_sub"] = "Bid placed on your job: $tit1 ";

                      $_SESSION["eml_mes"] = "Dear $name80, <br><br>$fname80 is appling on your project for Rs. $jobbid<br>
                                              Project: $tit1, $PCity to $DCity.
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
        <div class="col-xl-3 text-sm-right text-left order-sm-2 order-3 order-xl-3 col-sm-6 mb-4 mb-xl-0">


    <?php
    $uname1= "";
    if(isset($_SESSION["uname"])){
    $uname1= $_SESSION["uname"];
    }
    require('db.php');

    $sql="SELECT * FROM product_seller WHERE username='$uname1' AND product_id=$pid1 " ;
    $result = $conn->query($sql);

    if($row = $result->fetch_assoc())
    {
    ?>
      <a href="#" data-toggle="modal"  class="btn btn-primary">Already Applied</a>
    <?php  
    } else {
    ?>
    <?php 
    if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] != $uidd){
    ?>





    <?php
    if (isset($_SESSION["verify"]) && $_SESSION["verify"] == "Verify" ){
    ?>
        <!--  ------------------------------------------ Button If Transporeter Verified ------------------- -->
        <a href="#" data-toggle="modal" data-target="#jobModal"class="btn btn-primary">Apply now</a>

    <?php

    }else{
    ?>
        <!--  ------------------------------------------ Model If Transporeter Not Verified ------------------- -->
        <a href="#" data-toggle="modal" data-target="#errorModal"class="btn btn-primary">Apply now</a>
    <?php
    }
    ?>





    <?php
      }

    }
    
    $conn->close();
    ?>
          
    </div>

    <!--  ------------------------------------------ Model If Transporeter Verified ------------------- -->

    <!-- Job Apply Modal -->
    <div class="modal fade" id="jobModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content rounded-5 border-0 p-4">
                

                <div class="modal-header border-0">
                    <h3>Bid</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
      <?php
          
          if (isset($_SESSION["uname"])){
          ?>





            <form action="#" method="POST" data-form-title="Job Bid">              
              
              <div class="form-group">
              <!-- <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" name="jobbid" placeholder="Bid Amount" required> -->
              <input type="number" style="font-weight: bold;" min="1" max="49900" onkeyup="uniCharCode(this.value)" class="form-control" name="jobbid" placeholder="Bid Amount" required>
              </div>
              <p id='earning'></p>
              
              
              <script type='text/javascript'>
              function uniCharCode(bidamt) {
                var amt = bidamt * 93 / 100;
                
                document.getElementById("earning").innerHTML = "Your Earning Rs.: <b>" + amt + "</b>";
              
              }
              </script>

              <div class="form-group">
                  <textarea name="jobdetails" class="form-control mb-3" placeholder="Cover Letter" required></textarea>
              </div>

              
            <input type="checkbox" id="terms" name="terms" value="Terms" required>
            <label for="vehicle1"> I agree with the <a href='http://localhost/trueshipp/termsofuse.php'>Terms</a> 
            & <a href='http://localhost/trueshipp/privacy.php'>Privacy</a> of Trueshipp</label><br>
            
              <button type="submit" class="btn btn-primary"  >Bid Now</button>

            </form>




                <?php
                  
                }else{
                  ?>

                    <div class="alert alert-danger" role="alert">
                      Warning! login as transporter to bid on this project.
                    </div>
                    
                  <?php
                }
                 ?>
            
           
            </div>



        </div>
    </div>
    </div>

    <!--  ------------------------------------------End Model If Transporeter Verified ------------------- -->





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
      <!-- course details -->
      <div class="row">
        <div class="col-12 mb-4">
          <h3><?php echo $tit1; ?></h3>
          <p><?php echo $desc; ?></p>
        </div>
        <div class="col-12 mb-4">
          <h3 class="mb-3">Details</h3>
          <div class="col-12 px-0">
            <div class="row">
              <div class="col-md-6">
                <ul class="list-styled">
                  <li>From: <?php echo $PCity; ?></li>
                  <li>To: <?php echo $DCity; ?></li>
                  <li>Start: <?php echo $Pdate; ?></li>
                  <li>End: <?php echo $Ddate; ?></li>
                </ul>
              </div>
              <div class="col-md-6">
                <ul class="list-styled">
                  <li>Category: <?php echo $cat; ?></li>
                  <li>Size: <?php echo $key; ?></li>
                  <li>Weight: <?php echo $wei; ?></li>
                  <li>Pack: <?php echo $num; ?></li>

            
                </ul>
                <a href="#" data-toggle="modal" data-target="#report33" class="float-right" style="color: red; float:right "><img src="images/report1.png" >Report</a> 
 
              </div>
            </div>
          </div>
        </div>
        
        
        
        
        
<!--        
        </div>

    </div>
        
    </div>
      
     
</section>

<section class="section-sm">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-4">
-->
 <!--  ------------------------------------------ Model Report  ------------------- -->

    
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
                      <input type="hidden" name="rcategory" value="job">
                      <input type="hidden" name="rname" value="<?php echo $fnm11; ?>">
                      <input type="hidden" name="stype" value="TRANSPORTER">
                              
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

<!--        </div>
      </div>
    </div>
</section>


   
  
<!-- Related JOB----------------------------------------------------------- 

<section class="section-sm" >
  <div class="container" >
    
    <div class="row" >
      <div class="col-md-12" >
      -->



      <h3>Related Job</h3>

      <div class="row justify-content-center">

    <?php
  

    require('db.php');
    
    $sql1="SELECT * FROM products Where typepost='JOB' AND product_id<>$pid1 AND  status1='Posted' ORDER BY product_id DESC Limit 4" ;
    
    $result1 = $conn->query($sql1);


    while($row1 = $result1->fetch_assoc())  {
 
      //  product_title, PCity, Pdate,   DCity,   DDate, product_cat, product_price, product_keywords, pweight, num_pack, product_desc, product_image, img2, img3, img4,  status1
        $pid1 =$row1['product_id'];
        $img1 =$row1['product_image'];
        $tit1 =$row1['product_title'];
        $pri1 =$row1['product_price'];
        $PCity =$row1['PCity'];
        $DCity =$row1['DCity'];
        $Pdate = $row1['PDate'];
        //$typepost = $row1['typepost'];

        $mselfdriving =$row1['mselfdriving'];
        $dselfdriving =$row1['dselfdriving'];
      
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

    <div onclick="javascript:window.location.href='vehicle_detail.php?jobid=<?php echo $pid1; ?>' " class="col-lg-3 col-sm-6 mb-5" style="margin: 0px; padding: 2px;">
      <div class="card p-0 border-primary rounded-0 hover-shadow">
        <img class="card-img-top rounded-0 watermark" style="height: auto; width: 100%; object-fit: cover;  height:180px; "src="assets/images/<?php echo $pid1; ?>_1.png?t=<?php echo filemtime('assets/images/'.$pid1.'_1.png'); ?>" alt="trueshipp">
        <!-- <img style="position:relative; top: -15px; width: 80px; margin-bottom: -25px;" src="images/logo50.png"> -->
        <div class="card-body">
          <a>
          <ul class="list-inline mb-2" style="font-size: 11px;">
            <li class="list-inline-item">₹.<?php echo $dselfdriving; ?> per Day</li><br>
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
          <li class="list-inline-item">₹.<?php echo $pri1; ?></li><br>
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
                    center: new Microsoft.Maps.Location(20.5937, 78.9629),
                    zoom: 5
                });
                Microsoft.Maps.loadModule('Microsoft.Maps.Directions', function () {
                    var directionsManager = new Microsoft.Maps.Directions.DirectionsManager(map);
                    // Set Route Mode to driving
                    directionsManager.setRequestOptions({ routeMode: Microsoft.Maps.Directions.RouteMode.driving });
                    var waypoint1 = new Microsoft.Maps.Directions.Waypoint({ address: '<?php echo $PCity; ?>' });
                    var waypoint2 = new Microsoft.Maps.Directions.Waypoint({ address: '<?php echo $DCity; ?>' });
                   // var waypoint1 = new Microsoft.Maps.Directions.Waypoint({ address: 'Pune', location: new Microsoft.Maps.Location(18.5204, 73.8567) });
                   // var waypoint2 = new Microsoft.Maps.Directions.Waypoint({ address: 'Raipur', location: new Microsoft.Maps.Location(21.2514, 81.6296) });
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