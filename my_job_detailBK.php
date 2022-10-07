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
    
          $sta111 = $row1['status1'];
          $reject_note = $row1['reject_note'];
    
        }
				?>

<section class="page-title-section overlay" style="background: url(images/backgrounds/tra1.jpg) no-repeat center center;" >
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <ul class="list-inline custom-breadcrumb">
            <li class="list-inline-item"><a class="h3 text-primary font-secondary" href="#">Job Detail</a></li>
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
      
    <?php
            if ($sta111 == "Reject"){  ?>
      <div class="row">
          <div class="col-md-6 mb-4">
          
            <span style='color: red;'> Status: <?php echo $sta111; ?>, Reason: <?php echo $reject_note; ?></span>
           
        
          </div>
      </div>
    <?php  }   ?>



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
      <div class="row align-items-center">
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
          <h5 class="mb-3">Bids</h5>         
          <div class="border-bottom border-primary mt-4"></div>

<!-- --------------------------------- bid count -------------------- -->

<!-- <table class="table table-success table-striped"> -->
<table class="table ">
  <thead>
    <tr>
      <th scope="col-2">Bidder</th>
      <th scope="col-2">Name</th>
      <th scope="col-2">Bid</th>
      <th scope="col-2">Details</th>
      <th scope="col-2" style="width: 300px;">Action</th>
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
                            $let222=$row222['coverLetter'];


                            $sql244="SELECT * FROM seller_info Where username='$sid222'" ;
                            $result244 = $conn222->query($sql244);
                        
                            $verify='';
                            $rating='';
                            $numjob='';
                              if($row244 = $result244->fetch_assoc())
                              {
                               
                                $verify=$row244['status1'];
                                $rating=$row244['rating'];
                                $numjob=$row244['numjob'];
                              }
                             
                              ?>

                              

                               <tr>
                                  <th scope="row">
                                  <!-- <img src='./assets/imagesu/<?php echo $sid222; ?>.jpg' style="height: 40px; " /> -->

                                  <img src="./assets/imagesu/<?php echo $sid222; ?>.jpg?t=<?php echo filemtime('./assets/imagesu/'.$sid222.'.jpg'); ?>" style="height: 40px; width: 40px;  object-fit: cover; "  >

                                  <?php 
                                  if ($verify=="Verify"){
                                    ?>
                                    <img src='./images/verify.png' style="height: 20px; " />
                                    <?php            }       ?>
                                  </th>
                                  <td><?php echo $fnm222; ?>
                                          <?php
                                            if ($rating > 0 ) { ?>
                                          
                                              <span style='color: blue'> | <?php
                                              if ($rating>0 && $rating<=5){
                                                            
                                                                    //for ($s = 1; $s <=  $rating; $s++){
                                                                    //  echo "☆";
                                                                    //}
                                                                  echo "<img style='width:147px;' src='images/rat$rating.jpg'>";
                                                                  }
                                                                  ?>
                                              (Jobs: <?php echo $numjob; ?>)</span>
                                          
                                          <?php } ?>
                                
                                </td>
                                  <td><?php echo $rat222; ?></td>
                                  <td>


<!-- -------------------------- Cover Letter - Popup  Model Start  ------------ -->
 
<a href="#" data-toggle="modal" data-target="#CoverLetter<?php echo $num222; ?>"class="btn btn-secondary btn-sm" style="border: 1px solid #aaa; border-radius: 5px;">Cover Letter</a>
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
                                    <a href="#" class="">
                                      
<!-- -------------------------- Award - Popup Model Start  ------------ -->
 
<a href="#" data-toggle="modal" data-target="#Award<?php echo $num222; ?>"class="btn btn-secondary btn-sm" style="border: 1px solid #aaa; border-radius: 5px;">Book Transporter</a>
    <!-- Job Apply Modal -->
<div class="modal fade" id="Award<?php echo $num222; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-5 border-0 p-4">
            
        <div class="modal-header border-0">
                <h4>Award Job</h4>
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
              
            <input type="checkbox" id="terms" name="terms" value="Terms" required>
            <label for="vehicle1"> I agree with the <a href='http://localhost/trueshipp/termsofuse.php'>Terms</a> 
            & <a href='http://localhost/trueshipp/privacy.php'>Privacy</a> of Trueshipp</label><br>
            
              
              <br><button type="submit" class="btn btn-primary"  >Award Now</button>

            </form>

            </div>
        </div>
      </div>
</div>     


<!-- --------------------------Award - Popup Model End ------------ -->


                                    </a>
    
                                  </td>
                                </tr>

                              <?php
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