<?php 
try{
  // echo "<br><br>";
  session_start();
}catch(Exception $e){

}
include("header.php");
?>

<!-- Common Area Top ------------------ -->


<?php 
						
						
						
					if(isset($_POST['jobbid']) && isset($_POST['rating']) && isset($_POST['jobdetails']) ) {

              $jobbid = ($_POST['jobbid']);
              //$jobrate = ($_POST['jobrate']);
              $jobrate = $_POST['rating'];
              $jobdetails = ($_POST['jobdetails']);
              $tuid = ($_POST['tuid']);
            // echo "<br><br><br><br> $jobbid <br> $jobrate <br> $jobdetails ";
              require('db.php');

              try {

                $conn1 = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
                // set the PDO error mode to exception
                $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
              

                $data = [
                  'rating' => $jobrate,
                  'rating_msg' => $jobdetails,
                  'product_id' => $jobbid
              ];
              $sql = "UPDATE products SET rating=:rating, rating_msg=:rating_msg  Where product_id=:product_id";
              $stmt= $conn1->prepare($sql);
              
              
                if ($stmt->execute($data) === TRUE) {
                  
                  //----------------
                  $sql1="SELECT * FROM products where tusername='$tuid' AND rating <> -1 " ;
                  //echo $sql1; 
                  $result1 = $conn->query($sql1);
            
                  $tcnt=0;
                  $ttot=0;
                   while($row1 = $result1->fetch_assoc())
                    {
                      $tcnt++;
                      $rt = $row1['rating'];
                      $ttot=$ttot + $rt;
                    }
                    $ttt = $ttot/$tcnt;
                    if($tcnt>0 && $ttt <= 5) 
                    {
                      $sql="UPDATE  seller_info SET rating=$ttt, numjob=$tcnt where username='$tuid'  " ;
                      $conn->query($sql);
                    }
                  //----------------

                  echo '<script>alert("You have rate successfully this job.")</script>';
                                    
                } else {
                  echo '<script>alert("Warning! Error rating this job.")</script>';
                    
                  //echo "Error Inserting record: " . $conn1->error;
                }
                
                
                //$stmt->close();
                 
                echo "New records created successfully";

 

                } catch(PDOException $e) {
                //echo "Error: " . $e->getMessage();
                }
                $conn1 = null;
              
              
                

              	}
						
					
						
						?>




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
  
      

			$sql1="SELECT * FROM products Where product_id=$jobid" ;
      //echo $sql1; 
			$result1 = $conn->query($sql1);

			
			while($row1 = $result1->fetch_assoc())
			  {
        	$pid1 =$row1['product_id'];
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
          $stat1 = $row1['status1'];

          $tuid1 =$row1['tusername'];
          $paystatus=$row1['paystatus'];
          $rat222=$row1['rating'];
          $rating=$row1['rating'];
    
        }
				?>

<section class="page-title-section overlay" style="background: url(images/backgrounds/tra1.jpg) no-repeat center center;" >
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <ul class="list-inline custom-breadcrumb">
            <li class="list-inline-item"><a class="h3 text-primary font-secondary" href="#">Delivered Job</a></li>
            <li class="list-inline-item text-white h3 font-secondary nasted"><?php echo $PCity; ?> - <?php echo $DCity; ?></li>
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
          <!-- course thumb -->
          <img src="assets/images/<?php echo $img1; ?>" class="img-fluid w-100">
          <!-- <img style="position:relative; top: -19px; width: 100px;" src="images/logo50.png"> -->
        </div>

        <div class="col-md-6 mb-4">
          <!-- course thumb -->
          <div id='myMap' style='width: 100%; height: 100%; min-height:250px;'></div>
        </div>

        
      </div>
      <!-- course info -->
      <div class="row align-items-center ">
        <div class="col-xl-3 order-1 col-sm-6 mb-4 mb-xl-0">
          <h3><?php echo $st2; ?></h3>
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






<!-- ------------------------------- Model Button ------------------- -->
        <div class="col-xl-3 text-sm-right text-left order-sm-2 order-3 order-xl-3 col-sm-6 mb-4 mb-xl-0">

        Job Status - <?php echo $stat1; ?>
        <br>Pay Status - <?php echo $paystatus; ?>
<!--
            <a href="#" data-toggle="modal" data-target="##jobModal1"class="btn btn-primary">Apply now</a>


    -->     
          
        </div>

<!--  ------------------------------------------ Model ------------------- -->

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
                  <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" name="jobbid" placeholder="Bid Amount" required>
              </div>
              <div class="form-group">
                  <textarea name="jobdetails" class="form-control mb-3" placeholder="Cover Letter" required></textarea>
              </div>
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

<!--  ------------------------------------------ Model End------------------- -->

               






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
              </div>
            </div>
          </div>
        </div>
        
        
        </div>
       
        
        <div class="col-12">
          <h5 class="mb-3">Project Awarded To</h5>         
          <div class="border-bottom border-primary mt-4"></div>

<!-- --------------------------------- bid count -------------------- -->

<table class="table ">
  <thead>
    <tr>
      <th scope="col-2">Bidder</th>
      <th scope="col-2">Name</th>
      <th scope="col-2">Bid</th>
      <th scope="col-2">Details</th>
      <th scope="col-2">Action</th>
    </tr>
  </thead>
  <tbody>
   
    
  


<?php
                        
                        $sql222="SELECT * FROM product_seller Where product_id=$jobid" ;
                        $result222 = $conn222->query($sql222);

                  
                          $num222=0;
                          while($row222 = $result222->fetch_assoc())
                          {
                            $num222++;
                            $psid222=$row222['psid'];
                            $sid222=$row222['username'];
                            $rat222=$row222['rate'];
                            $fnm222=$row222['full_name'];
                            $img222=$row222['proImg'];
                            $let222=$row222['coverLetter'];
                           
                            //$paystatus=$row222['paystatus'];

                            if ($tuid1 == $sid222){
                               

                            $sql244="SELECT * FROM seller_info Where username='$sid222'" ;
                            $result244 = $conn222->query($sql244);
                        
                              if($row244 = $result244->fetch_assoc())
                              {
                               
                                $verify=$row244['status1'];
                                $ratingT=$row244['rating'];
                                $numjob=$row244['numjob'];
                              }
                             

                             
                              ?>
                               <tr>
                                  <th scope="row">
                                  <!-- <img src='./assets/imagesu/<?php echo $sid222; ?>.jpg' style="height: 40px; " /> -->
                                  <img src="./assets/imagesu/<?php echo $sid222; ?>.jpg?t=<?php echo filemtime('./assets/imagesu/'.$sid222.'.jpg'); ?>" style="height: 40px; width: 40px;  object-fit: cover;"  >

                                  <?php 
                                  if ($verify=="Verify"){
                                    ?>
                                    <img src='./images/verify.png' style="height: 20px; " />
                                    <?php            }       ?>
                                    </th>
                                  <td><?php echo $fnm222; ?>
                                  <?php
                                            if ($ratingT > 0 ) { ?>
                                          
                                              <span style='color: blue'> | <?php
                                              if ($ratingT>0 && $ratingT<=5){
                                                            
                                                                   // for ($s = 1; $s <=  $ratingT; $s++){
                                                                   //   echo "☆";
                                                                   // }
                                                                    echo "<img style='width:147px;' src='images/rat$ratingT.jpg'>";
                                                                  }
                                                                  ?>
                                              (Jobs: <?php echo $numjob; ?>)</span>
                                          <?php } ?>
                                  </td>
                                  <td><?php echo $rat222; ?></td>
                                  <td>


<!-- -------------------------- Cover Letter - Popup  Model Start  ------------ -->
 
<a href="#" data-toggle="modal" data-target="#CoverLetter<?php echo $num222; ?>"class="btn btn-secondary btn-sm">Cover Letter</a>
    <!-- Job Apply Modal -->
<div class="modal fade" id="CoverLetter<?php echo $num222; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-5 border-0 p-4">
            

            <div class="modal-header border-0">
                <h5>Cover Letter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


            <textarea name="desc" class="form-control mb-3"  placeholder="Job Details"><?php echo $let222; ?></textarea>                
            

            </div>
        </div>
      </div>
</div>     


<!-- --------------------------Popup Model End ------------ -->
                                 
                                 
                                 
                                 
                                 
                                  </td>
                                  <td>
                                  <a href="messagestart.php?jobid=<?php echo $jobid; ?>&psid=<?php echo  $psid222; ?>" class="">Chat</a> | 
                   
                                   
                                  <!--  <a href="message.php" class="">Chat</a> -->
                                    
                                    <?php 
                                    if ($paystatus == "Fund Released" && $rating == -1){
                                     
                                      ?>
<!-- -------------------------- Rating - Popup  Model Start  ------------ -->
 
<a href="#" data-toggle="modal" data-target="#rating"class="btn btn-primary btn-sm right">Rate ☆☆☆☆☆</a>
    <!-- Job Apply Modal -->
<div class="modal fade" id="rating" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-5 border-0 p-4">
            

            <div class="modal-header border-0">
                <h5>Provide Rating</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            
            <form action="#" method="POST" data-form-title="Job Bid">              
              <input type="hidden" name="jobbid" value="<?php echo $pid1; ?>"/>
              <input type="hidden" name="tuid" value="<?php echo $tuid1; ?>"/>
              <!--
              <div class="form-group">
              
              <select class="form-control " style="width: 180px; height: 60px; color: Orange;" name="jobrate" placeholder="Rating">
              <option value='5' selected >☆☆☆☆☆</option>
              <option value='4' >☆☆☆☆</option>
              <option value='3' >☆☆☆</option>
              <option value='2' >☆☆</option>
              <option value='1' >☆</option>
               
								
            </select></div>
                                    -->



            <div class="form-group">
            <fieldset class="rating">
              <input type="radio" id="star5" name="rating" value="5" checked/><label class="full" for="star5" title="Awesome - 5 stars"></label>
              <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
              <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Normal - 3 stars"></label>
              <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Average - 2 stars"></label>
              <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Very Bad - 1 star"></label>
            </fieldset>
            </div>  
          
            <br><br><br>
            
            
              <div class="form-group">
                  <textarea name="jobdetails" class="form-control mb-3" min="10" max="200" placeholder="Message" required></textarea>
              </div>
              <button type="submit" class="btn btn-primary"  >Submit rating</button>

            </form>


            </div>
        </div>
      </div>
</div>     


<!-- --------------------------Rating Model End ------------ -->

<?php
                                  }else{
                                    
                                   
                              echo " $paystatus";
                              if ($rating>0 && $rating<=5){
                                /*
                                echo "<p style='color: orange'>Rating: ";
                                      for ($s = 1; $s <=  $rating; $s++){
                                        echo "☆";
                                      }
                                      echo "</p>";
                                    
*/

                            echo "<p style='color: orange'>Job Rating: <img style='width:147px;' src='images/rat$rating.jpg'></p>";
       
                                    }
                                  }
                                    ?>
                                
                                    <a href="#" class="">
                                      
<!-- -------------------------- Award - Popup Model Start  ------------ 
 
<a href="#" data-toggle="modal" data-target="#Award<?php echo $num222; ?>"class="btn btn-secondary btn-sm">Award</a>
    
<div class="modal fade" id="Award<?php echo $num222; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-5 border-0 p-4">
            
        <div class="modal-header border-0">
                <h5>Award Job</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="my_job_detailCD.php" method="POST" data-form-title="Job Award">              
              
              
              <div class="form-group">
                <p>Confirmation of award project to <b><?php echo $fnm222; ?></b></p>
              </div>

             
              <input type="hidden" name="jobid" value="<?php echo $pid1; ?>" />
              <input type="hidden" name="tusername" value="<?php echo $sid222; ?>" />
              <input type="hidden" name="tname" value="<?php echo $fnm222; ?>" />
              <input type="hidden" name="timage" value="<?php echo $img222; ?>" />
              <input type="hidden" name="tprice" value="<?php echo $rat222; ?>" />
              <button type="submit" class="btn btn-primary"  >Award Now</button>

            </form>

            </div>
        </div>
      </div>
</div>     


-->

<!-- --------------------------Award - Popup Model End ------------ -->


                                    </a>
    
                                  </td>
                                </tr>

                              <?php
                          }
                        }
                          ?>
                  
    </tbody>
</table>                           
                                    
                                     
          
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