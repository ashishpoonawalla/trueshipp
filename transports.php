<?php
try{
  // echo "<br><br>";
  session_start();
}catch(Exception $e){

}


include("header.php");
?>

<!-- Common Area Top ------------------ -->







<!-- Search Bar -->
<?php

$City1="";

$numQ = 0;
$Query1="";

$Q11 = "";

$Query1 = "";   
$Query1 = " WHERE status1<>'Admin' AND status1<>'Blocked' ";  

if(isset($_GET['City1']) ){

  $City1 = $_GET['City1'];

    if($City1!=''){  
      $Q11 .="&City1=$City1";
      //$Query1 = " WHERE city='$City1' AND status1='Run' ";   
      $Query1 = " WHERE city='$City1' AND status1<>'Admin' AND status1<>'Blocked' ";      
      $numQ++;
    }
}



?>

<section class="page-title-section overlay" style="background: url(images/backgrounds/tra1.jpg) no-repeat center center;" >
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        
         <a class="h3 text-primary font-secondary form-group mx-sm-2" href="#">Transporter Search</a> 
        
        <form class="form-inline" action="transports.php" method="GET">

          <div class="form-group  mx-sm-2">
            
            <input type="text" class="form-control" style="width: 150px; height: 40px;" name="City1" value="<?php echo $City1 ?>" placeholder="City">
          </div>
          &nbsp;
          <div class="form-group mx-sm-2">
              &nbsp;<button type="submit" class="btn btn-primary  mx-sm-3" style="height: 40px; padding-top: 11px;"><i class="ti-search mr-1 "></i></button>
          </div>
        </form>
        
      </div>
    </div>
  </div>
</section>
<!-- /Search Bar -->

<!--
<section class="section">
    <div class="container">
      <div class="row">
        <div class="col-12">




<section class="container py-4">
    <div class="row">
        <div class="col-md-12">
            <h2>Tabs</h2>
            <ul id="tabs" class="nav nav-tabs">
                <li class="nav-item"><a href="" data-target="#home1" data-toggle="tab" class="nav-link small text-uppercase">Home</a></li>
                <li class="nav-item"><a href="" data-target="#profile1" data-toggle="tab" class="nav-link small text-uppercase active">Profile</a></li>
                <li class="nav-item"><a href="" data-target="#messages1" data-toggle="tab" class="nav-link small text-uppercase">Messages</a></li>
            </ul>
            <br>
            <div id="tabsContent" class="tab-content">
                <div id="home1" class="tab-pane fade">
                    <div class="list-group"><a href="" class="list-group-item d-inline-block"><span class="float-right badge badge-pill badge-dark">51</span> Home Link</a> <a href="" class="list-group-item d-inline-block"><span class="float-right badge badge-pill badge-dark">8</span> Link 2</a> <a href="" class="list-group-item d-inline-block"><span class="float-right badge badge-pill badge-dark">23</span> Link 3</a> <a href="" class="list-group-item d-inline-block text-muted">Link n..</a></div>
                </div>
                <div id="profile1" class="tab-pane fade active show">
                    <div class="row pb-2">
                        <div class="col-md-7">
                            <p>Tabs can be used to contain a variety of content &amp; elements. They are a good way to group <a href="" class="link">relevant content</a>. Display initial content in context to the user. Enable the user to flow through <a href="" class="link">more</a> information as needed. </p>
                        </div>
                        <div class="col-md-5"><img src="//dummyimage.com/1005x559.png/5fa2dd/ffffff" class="float-right img-fluid img-rounded"></div>
                    </div>
                </div>
                <div id="messages1" class="tab-pane fade">
                    <div class="list-group"><a href="" class="list-group-item d-inline-block"><span class="float-right badge badge-pill badge-dark">44</span> Message 1</a> <a href="" class="list-group-item d-inline-block"><span class="float-right badge badge-pill badge-dark">8</span> Message 2</a> <a href="" class="list-group-item d-inline-block"><span class="float-right badge badge-pill badge-dark">23</span> Message 3</a> <a href="" class="list-group-item d-inline-block text-muted">Message n..</a></div>
                </div>
            </div>
        </div>
    </div>
</section>


        </div>
      </div>
    </div>
</section>
-->

  <!-- notice -->
  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <ul class="list-unstyled">



          <?php
			
			require('db.php');


      $limit = 10; 


      if (isset($_GET["page"] )) 
          {
          $page  = $_GET["page"]; 
          } 
      else 
         {
          $page=1; 
         };  
  
      $record_index= ($page-1) * $limit;      
  
  
  
      //$sql = "SELECT * FROM brands LIMIT $record_index, $limit";

 //  $sql1="SELECT * FROM seller_info $Query1 ORDER BY product_id DESC Limit 10" ;		


			$sql1="SELECT * FROM seller_info $Query1 Order By rating desc Limit $record_index, $limit" ;
      //echo $sql1; 
			$result1 = $conn->query($sql1);

			$cnt=0;
			 while($row1 = $result1->fetch_assoc())
			  {
          $cnt++;
        //  product_title, PCity, Pdate,   DCity,   DDate, product_cat, product_price, product_keywords, pweight, num_pack, product_desc, product_image, img2, img3, img4,  status1
			  	$unm1 =$row1['username'];
			  	$img1 =$row1['proImg'];
          $snm1 =$row1['store_name'];
          $fnm1 =$row1['full_name'];
          $city =$row1['city'];
          $verify=$row1['status1'];
          $rating=$row1['rating'];
          $numjob=$row1['numjob'];
          $status1=$row1['status1'];
          $membership1=$row1['membership'];
          $hireme1=$row1['hireme'];
				?>


        <!-- notice item -->
            <li li class="d-md-table mb-4 w-100 border-bottom hover-shadow">
                <div class="d-md-table-cell text-center p-4  text-white mb-4 mb-md-0" style="width: 160px; ">
                
                <?php 
                  if ($membership1 == "Gold 6 Months" || $membership1 == "Gold 12 Months"){
                    ?>
                <div style="padding:2px; height: 108px; width: 108px; object-fit: cover; border: 2px solid orange; border-radius: 6px; ">
                <img src='./assets/imagesu/<?php echo $unm1; ?>.jpg?t=<?php echo filemtime('./assets/imagesu/'.$unm1.'.jpg'); ?>' style="height: 100px; width: 100px; object-fit: cover; border: 2px solid gold; border-radius: 4px; " /></div>
                </div>

                <?php 
                 }else{
                    ?>

                <img src='./assets/imagesu/<?php echo $unm1; ?>.jpg?t=<?php echo filemtime('./assets/imagesu/'.$unm1.'.jpg'); ?>' style="height: 100px; width: 100px; object-fit: cover; " /></div>
                
                <?php 
                  }
                    ?>
                <div class="d-md-table-cell px-4 vertical-align-middle mb-4 mb-md-0" style="width: 360px;">
                <h4><?php echo $fnm1; ?><?php 
                                  if ($verify=="Verify"){
                                    if ($membership1 == "Gold 6 Months" || $membership1 == "Gold 12 Months"){                                    
                                    ?>
                                    
                                      <img src='./images/Gold.png' style="height: 30px; " />
                                    <?php }else{ ?>
                                      <img src='./images/verify.png' style="height: 30px; " />



                                    <?php        }
                                      }       ?></h4>
                <p class="mb-0"><?php echo $snm1; ?> <b><?php echo $city; ?></b></p>
              </div>
              <?php
              if ($rating > 0 ) { ?>
              <div class="d-md-table-cell px-4 vertical-align-middle mb-4 mb-md-0">
                <!-- 
                  <h4 style='color: orange'><?php
                 if ($rating>0 && $rating<=5){
                                echo "Rating: ";
                                      for ($s = 1; $s <=  $rating; $s++){
                                        echo "☆";
                                      }
                                     
                                    }
                                    ?></h4>
                                    -->

                                    <h4 style='color: orange'><?php
                 if ($rating>0 && $rating<=5){
                                echo "<img style='width:147px;' src='images/rat$rating.jpg'>";
                                     
                 }?></h4>
                <p class="mb-0">Project Deliverd: <b><?php echo $numjob; ?></b></p>
              </div>
              <?php } ?>
              <div class="d-md-table-cell text-right pr-0 pr-md-4">
                
            <?php 
            if ($status1== "Verify"){
            ?>

             
  <!-- ---------------------------- Popup Model ------------- -->

            <a href="#" data-toggle="modal" data-target="#id4Modal<?php echo $cnt;?>" class="btn btn-primary">Detail</a></div>
            
            <div class="modal fade" id="id4Modal<?php echo $cnt;?>" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content rounded-5 border-0 p-4">
                      
                      <div class="modal-header border-0">
                          <h3><?php echo $fnm1; ?></h3> <?php 
                                  if ($verify=="Verify"){
                                    if ($membership1 == "Gold 6 Months" || $membership1 == "Gold 12 Months"){                                    
                                      ?>
                                      
                                        <img src='./images/Gold.png' style="height: 30px; " />
                                      <?php }else{ ?>
                                        <img src='./images/verify.png' style="height: 30px; " />
  
  
                                    <?php            } 
                                    }      ?>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">



                          
  <div class="row">

  <!-- Left Side ----------------------------------------------------- -->    
    <div class="col-lg-3 mb-4 mb-lg-0" >

      <?php 
          if ($membership1 == "Gold 6 Months" || $membership1 == "Gold 12 Months"){
        ?>
        <div style="padding:2px; height: 158px; width: 158px; object-fit: cover; border: 2px solid orange; border-radius: 6px; ">
                
          <img src='./assets/imagesu/<?php echo $unm1; ?>.jpg?t=<?php echo filemtime('./assets/imagesu/'.$unm1.'.jpg'); ?>' style="height: 150px; width: 150px; object-fit: cover; border: 4px solid gold; border-radius: 4px;" />
        </div>
      <?php 
          }else{
            ?>
       <img src='./assets/imagesu/<?php echo $unm1; ?>.jpg?t=<?php echo filemtime('./assets/imagesu/'.$unm1.'.jpg'); ?>' style=" max-height: 150px; padding: 2px; " />
      

       <?php 
          }
            ?>
        <br><br> 

        <!--  <h4><?php echo $fnm1; ?><?php 
            if ($verify=="Verify"){
              ?>
              <img src='./images/verify.png' style="height: 30px; " />
              <?php            }       ?></h4>
            -->

        <p class="mb-0"><?php echo $snm1; ?> <b><?php echo $city; ?></b></p>

        <br><h4 style='color: orange'><?php
                 if ($rating>0 && $rating<=5){
                                echo "<img style='width:100%; max-width: 130px;' src='images/rat$rating.jpg'>";
                                     
                 }?></h4>
                <p class="mb-0">Project Deliverd: <b><?php echo $numjob; ?></b></p>
                 <br>
                 <?php
                 if ($hireme1 == "ON"){
                   ?>
                 <a href="#" data-toggle="modal" data-target="#HireMe<?php echo $cnt;?>" class="btn btn-info btn-sm" style="width: 100%; max-width: 150px;" >₹ Hire me</a>
                 <br><br>
                  <?php } ?>
                 <a href="#" data-toggle="modal" data-target="#Contact<?php echo $cnt;?>" class="btn btn-default btn-sm" style="width: 100%; max-width: 150px; border: 1px solid #aaa;">💬 Contact</a>
            
    </div>



<!-- Right Side ----------------------------------------------------- -->    
    <div class="col-lg-9 mb-4 mb-lg-0" >
    
    <section class="container py-4">
        <div class="row">
            <div class="col-md-12">
            
                <ul id="tabs" class="nav nav-tabs">
                    <li class="nav-item"><a href="" data-target="#business9<?php echo $cnt;?>" data-toggle="tab" class="nav-link small text-uppercase active">Vehicle</a></li>
                    <li class="nav-item"><a href="" data-target="#person9<?php echo $cnt;?>" data-toggle="tab" class="nav-link small text-uppercase ">Rating - <?php echo $numjob; ?></a></li>
                    
                </ul>
                <div id="tabsContent" class="tab-content">

        <!-- Vehicle Tab ----------------------------------------------------- -->                
        <div id="business9<?php echo $cnt;?>" class="tab-pane fade active show">
            <br>  


            <!-- <img src='./assets/imagesu/<?php echo $unm1; ?>ID4.png?t=<?php echo filemtime('./assets/imagesu/'.$unm1.'ID4.png'); ?>' style="Width: 100%; " /> -->
               
            <!-- slider --------------------------------------------------- -->


          <div class="w3-content w3-display-container">
            
          <?php
            
            $ccntImg = 1;
          
            if ($membership1 == "Silver 6 Months" || $membership1 == "Silver 12 Months" ){

              $ccntImg = 5;

            }else if ($membership1 == "Gold 6 Months" || $membership1 == "Gold 12 Months" ){
                 
              $ccntImg = 40;

            }


            for ($cc = 1; $cc <= $ccntImg; $cc++){
            
              if (file_exists("./assets/imagesu/".$unm1."ID".($cc+3).".png")){
              ?>
              
                <img class="mySlides1" style="width:100%; object-fit: cover; height: 280px; " src="./assets/imagesu/<?php echo $unm1; ?>ID<?php echo ($cc+3); ?>.png?t=<?php echo filemtime('./assets/imagesu/'.$unm1.'ID'.($cc+3).'.png'); ?>" class="img-fluid w-100">
                <hr>
              <?php 
              } 
              
            }

            ?>
            
            
            

          <!--
          <img class="mySlides" src="img_snowtops.jpg" style="width:100%">
          <img class="mySlides" src="img_lights.jpg" style="width:100%">
          <img class="mySlides" src="img_mountains.jpg" style="width:100%">
          <img class="mySlides" src="img_forest.jpg" style="width:100%">
          -->
          <!-- <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button> -->
          <!-- <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button> -->
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





        </div>
                
        <!-- Rating Tab ---------------------------------------------------------- -->                
        <div id="person9<?php echo $cnt;?>" class="tab-pane fade " >
            <br>
            <div style="width: 100%; height: 300px; overflow-y: scroll; padding: 5px; ">
              <ul class="list-unstyled">
              <?php
                require('db.php');
                  $Query11 = "Where status1='Delivered' AND tusername='".$unm1."'";
                    
                  $sql11="SELECT * FROM products $Query11 ORDER BY product_id DESC " ;
                      
                      $result11 = $conn->query($sql11);
                      
                      while($row11 = $result11->fetch_assoc())
                      {
                          $pid11 =$row11['product_id'];
                          $uid11 =$row11['userID'];
                          $msg11 =$row11['rating_msg'];
                          $mystr = substr($msg11, 0, 20);
                          $rating11=$row11['rating'];           

                        
              
                          $sql12="SELECT * FROM user_info WHERE user_id='$uid11' " ;
                          $result12 = $conn->query($sql12);

                          $nm12 =""; $upic = "";

                          if($row12 = $result12->fetch_assoc())
                          {
                            $nm12 =$row12['first_name'];
                            $upic =$row12['email'];
                          }
                            ?>

                            <li li class="d-md-table mb-4 w-100 shadow" style="border-radius: 30px; background-color: #fff; font-size: 12px;">
                              
                            
                              <img src='./assets/imagesu/<?php echo $upic; ?>.jpg?t=<?php echo filemtime('./assets/imagesu/'.$upic.'.jpg'); ?>' style="height: 40px; border-radius: 30px;" />
                              <?php echo $nm12; ?>
                              
                              
                              &nbsp;`<?php echo $mystr; ?>`&nbsp;
                            <?php
                                    if ($rating11>0 && $rating11<=5){
                                          echo "<img style='width:100px;' src='images/rat$rating11.jpg' style='float: right;'><br>";
                                      }
                  

                      }
                      ?>
              
                    </li>
                </ul>
            </div>
                            
            
        </div>



                </div>
            </div>
        </div>
    </section>
    <br>
    <a href="#" data-toggle="modal" data-target="#report<?php echo $cnt;?>" class="float-right" style="color: red; "><img src="images/report1.png" >Report</a>
            
    </div>
                            
  </div>                    
                      
                      
                          
                      </div>
                  </div>
              </div>
          </div>
<!-- ---------------------------- Popup Model End------------- -->
            
<!--  ------------------------------------------ Model Hire Me  ------------------- -->

<div class="modal fade" id="HireMe<?php echo $cnt;?>" tabindex="-1"  role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div style="background-color: #eeeeee; width:95%; margin-left: 10px; border: 1px solid #aaa;" class="modal-content rounded-5  p-4">
            
            <div class="modal-header border-0">
                <h3>Hire me</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
      <?php
      
     // if (isset($_SESSION["uname"])){
      ?>
        <form action="transportsHire.php" method="post" name="f2" >

            <input type="hidden" max="100" name="tunm1" value="<?php echo $unm1; ?>" >
            <input type="hidden" max="100" name="tfnm1" value="<?php echo $fnm1; ?>" >                
            
            <input type="text" class="form-control mb-3" name="title" placeholder="Your Job Title"  maxlength="250" required style= "padding: 5px; height: 34px; font-size: 12px; ">            
            <input type="text" class="form-control mb-3" name="paddress" placeholder="Pickup Full Address"  maxlength="300" required style= "width: 70%; float: right;padding: 5px; height: 34px; font-size: 12px; ">
            <input type="text" class="form-control mb-3" name="pcity" placeholder="Pickup City Only" maxlength="100"  required style= "width: 30%;padding: 5px; height: 34px; font-size: 12px; ">
            Packege Pickup Date:
            <input type="date" class="form-control mb-3" name="pdate" placeholder="Pickup Date" required style= "padding: 5px; height: 34px; font-size: 12px; ">
            <input type="text" class="form-control mb-3" name="daddress" placeholder="Drop Full Address" style="width: 70%; float: right; padding: 5px; height: 34px;font-size: 12px;  " maxlength="300" required>
            <input type="text" class="form-control mb-3" name="dcity" placeholder="Drop City Only" style="width: 30%;padding: 5px; height: 34px; font-size: 12px; " maxlength="100" required>
            Packege Delivery Date:
            <input type="date" class="form-control mb-3" name="ddate" placeholder="Drop Date" required style= "padding: 5px; height: 34px; font-size: 12px; ">
            
            Category:
            <select class="form-control  mb-3" name="category" required="" placeholder="" style= "padding: 5px; height: 34px; font-size: 12px; ">
								<?php
				
								require('db.php');
								
								$sql123="SELECT * FROM categories" ;
								
								$result123 = $conn->query($sql123);

								
								 while($row123 = $result123->fetch_assoc())
								 {
								  	$id=$row123['cat_id'];
                    $cat=$row123['cat_title'];
                    echo "<option value='$cat'>$cat</option>";									
								 }
									
							    ?>
								
            </select>
							
            <input type="number" min="500" max="49900" class="form-control mb-3" name="price" placeholder="Budget of delivery" maxlength="8" required style= "padding: 5px; height: 34px;font-size: 12px;  ">
            <input type="text" class="form-control mb-3" name="size" placeholder="Size (length x width x height)" maxlength="30" required style= "padding: 5px; height: 34px; font-size: 12px; ">
            <input type="text" class="form-control mb-3" name="pweight" placeholder="Weight in KG" maxlength="20" required style= "padding: 5px; height: 34px; font-size: 12px; ">
            <input type="text" class="form-control mb-3" name="num_pack" placeholder="Number of packages (1/2/3)" maxlength="10" required style= "padding: 5px; height: 34px; font-size: 12px; ">
            
            <textarea name="desc" class="form-control mb-3" placeholder="Job Details" minlength="10" maxlength="30" required style= "height: 100px; padding: 5px; height: 34px; font-size: 12px; "></textarea>
            
            <!--<input type="checkbox" id="terms" name="terms" value="Terms" required> -->
            <!--<label for="vehicle1"> I agree with the <a href='http://localhost/trueshipp/termsofuse.php'>Terms</a> 
            & <a href='http://localhost/trueshipp/privacy.php'>Privacy</a> of Trueshipp</label><br>-->
            
            <button type="submit" value="send" class="btn btn-info">Next</button>
          </form>

           
            </div>

        </div>
    </div>
</div>

<!--  ------------------------------------------End Model Hire Me------------------- -->



<!--  ------------------------------------------ Model Contact  ------------------- -->

<div class="modal fade" id="Contact<?php echo $cnt;?>" tabindex="-1"  role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div style="background-color: #eeeeee; width:95%; margin-left: 10px; border: 1px solid #aaa; " class="modal-content rounded-5  p-4">
            
            <div class="modal-header border-0">
                <h3>Message me</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
      <?php
      
     // if (isset($_SESSION["uname"])){
      ?>
              <form action="transportsContact.php" method="post" name="f1" >              
                <input type="hidden" class="form-control" name="tunm1" value="<?php echo $unm1; ?>" >
                <input type="hidden" class="form-control" name="tfnm1" value="<?php echo $fnm1; ?>" >
                
                <div class="form-group">                
                  <input type="text" max="100" class="form-control" name="subject" placeholder="Subject" required>
                </div>
                
                <div class="form-group">
                    <textarea name="message" max="300"  style="height: 120px;" class="form-control mb-3" placeholder="Message" required></textarea>
                </div>
                <button type="submit" class="btn btn-info float-right"  >Send Message</button>
                <!-- <button type="submit"  class="btn btn-default float-right" data-dismiss="modal" aria-label="Close" >Cancel</button> -->
              </form>
           
            </div>

        </div>
    </div>
    
</div>

<!--  ------------------------------------------End Model Contact------------------- -->
<!-- 
          $unm1 =$row1['username'];
			  	$img1 =$row1['proImg'];
          $snm1 =$row1['store_name'];
          $fnm1 =$row1['full_name'];
          $city =$row1['city'];
          $verify=$row1['status1'];
          $rating=$row1['rating'];
          $numjob=$row1['numjob'];
          $status1=$row1['status1'];
 -->
<!--  ------------------------------------------ Model Report  ------------------- -->

<!-- <a href="#" data-toggle="modal" data-target="#report<?php echo $cnt;?>" class="float-right" style="color: red; "><img src="images/report1.png" >Report</a> -->
    
<div class="modal fade" id="report<?php echo $cnt;?>" tabindex="-1"  role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div style="background-color: #ffe6e6; width:80%; margin-left: 10px; border: 1px solid #aaa;" class="modal-content rounded-5  p-4">
            
            <div class="modal-header border-0">
                AD ID: <?php echo $pid11; ?> report
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
      <?php
      
     // if (isset($_SESSION["uname"])){
      ?>
            
            <form action="report_send.php" method="POST" data-form-title="Job Bid"> 
              <input type="hidden" name="rpid" value="-1">                
              <input type="hidden" name="ruserid" value="<?php echo $unm1; ?>">
              <input type="hidden" name="rcategory" value="transporter">
              <input type="hidden" name="rname" value="<?php echo $fnm1; ?>">
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



          <?php
            }else{

          ?>

          <!-- ---------------------------- Popup Not Verified Transporter ------------- -->

          <a href="#" data-toggle="modal" data-target="#verifyModal<?php echo $cnt;?>" class="btn btn-primary">Detail</a></div>
          
          <div class="modal fade" id="verifyModal<?php echo $cnt;?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                      <h4 style="text-align: center;">Transporter not verified by True Shipp</h4>
                      
                      
                 
              
             
              </div>
  
  
  
          </div>
              </div>
          </div>
            <!-- ---------------------------- Popup Not Verified Transporter  End------------- -->
            


          <?php
            }
          ?>  

          </li>

            

      <?php     }     ?>

      </ul>
        
          
<?php



$sql = "SELECT COUNT(*) FROM seller_info $Query1"; 
$retval1 = mysqli_query($conn, $sql);  
$row = mysqli_fetch_row($retval1);  
$total_records = $row[0];
$total_pages = ceil($total_records / $limit); 
//echo "$page, $total_pages";


$link1 = "";
if ($page > 1){
  $prev1 = "transports.php?page=".($page-1);
}else{

  $link1 = " disabled ";
}

$link2 = "";
if ($page <  $total_pages){
  $next1 = "transports.php?page=".($page+1);
}else{

  $link2 = " disabled ";
}

//$pagLink = "<div class='pagination'>";  
/*
echo "<ul class='pagination justify-content-center'>";
echo "<li class='page-item'><a href='transports.php?page=".($page-1)."' class='button'>Previous</a></li>"; 
    for ($i=1; $i<=$total_pages; $i++) {  
        echo "<li><a href='transports.php?page=".$i."'>".$i."</a></li>";
    };  
echo "<li><a href='transports.php?page=".($page+1)."' class='button'>NEXT</a></li>";
echo"</ul>";    
*/
?>
        

          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">

              <li class="page-item <?php echo $link1; ?>">
                <a class="page-link" href="<?php echo $prev1; ?><?php echo $Q11; ?>" tabindex="-1">Prev</a>
              </li>
              <!--                  <li class="page-item active"><a class="page-link" href="#">4</a></li>  -->

              <li class="page-item disabled"><a class="page-link" href="#"><?php echo $page.' of '.$total_pages; ?></a></li> 

              <li class="page-item <?php echo $link2; ?>">
                <a class="page-link" href="<?php echo $next1; ?><?php echo $Q11; ?>">Next</a>
              </li>
              

            </ul>
          </nav>
  
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


</body>
</html>