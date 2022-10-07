<?php 
			

include("header.php");
?>

<!-- Common Area Top ------------------ -->

<!-- Search Bar -->
<?php


$searchid="";


if ( isset($_POST['lat1']) && isset($_POST['lon1']) && isset($_POST['searchid']))   {
  $searchid = $_POST['searchid'];
  $lat1 = $_POST['lat1'];
  $lon1 = $_POST['lon1'];

  //echo "$searchid - $lat1 - $lon1 ";
  
}                           


$City1="";
$City2="";
$Date1="";
$Date2="";
$cat1="";


$numQ = 1;
$Query1=" Where status1='Posted' ";

$Q11 = "";

if(isset($_GET['City1']) ){
  $City1 = $_GET['City1'];
    if($City1!=''){  
      $Q11 .="&City1=$City1";
      $Query1 = " WHERE PCity='$City1' ";      
      $numQ++;
    }
}

if(isset($_GET['City2'])){
  $City2 = $_GET['City2'];

  if($City2!=''){  
    $Q11 .="&City2=$City2";
    if ($numQ==0){
      $Query1 = " WHERE DCity='$City2' ";
      $numQ++;
    }else{
      $Query1 .= " AND DCity='$City2' ";
      $numQ++;
    }
  }
}
/*
if(isset($_GET['Date1'])){
  $Date1 = $_GET['Date1'];

  if($Date1!=''){  
    $Q11 .="&Date1=$Date1";
    if ($numQ==0){
      $Query1 = " WHERE PDate>='$Date1' ";
      $numQ++;
    }else{
      $Query1 .= " AND PDate>='$Date1' ";
      $numQ++;
    }
  }

}

/*
if(isset($_GET['Date2'])){
  $Date2 = $_GET['Date2'];

  if($Date2!=''){  
    $Q11 .="&Date2=$Date2";
    if ($numQ==0){
      $Query1 = " WHERE PDate<='$Date2' ";
      $numQ++;
    }else{
      $Query1 .= " AND PDate<='$Date2' ";
      $numQ++;
    }
  }

}
*/

if(isset($_GET['cat'])){
  $cat1 = $_GET['cat'];

  if($cat1!=''){ 
    $Q11 .="&cat=$cat1"; 
    if ($numQ==0){
      $Query1 = " WHERE typepost='$cat1' ";
      $numQ++;
    }else{
      $Query1 .= " AND typepost='$cat1' ";
      $numQ++;
    }
  }

}else{
  $cat1 = "";
}


?>


<!-- Search Bar ------------------------------------ -->
<section class="page-title-section overlay" style="background: url(images/backgrounds/tra1.jpg) no-repeat center center;" >
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        
        <!-- Map Model --------------------  -->
        <audio id="sound1" src="images/click.mp3" preload="auto"></audio>

        <button onclick="document.getElementById('sound1').play();" href="#" data-toggle="modal" data-target="#postModal" class="btn btn-primary  mx-sm-3 float-right" style="height: 40px; padding-top: 11px; padding-left: 25px; width: 50px;"><i class="ti-location-pin mr-1 "></i> </button>
          
          <div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-hidden="true" >
              <div class="modal-dialog modal-lg" role="document" style="margin-top: 100px; padding: 10px;  ">
                  <div class="modal-content rounded-5 border-0 p-4" style=" padding: 10px; " >
                      <!--
                      <div class="modal-header border-0">
                          <h3>Login</h3>
                         
                      </div>
                      -->
                      <div class="modal-body">

                        <div id="myMap" style="position:relative;width:100%; min-width: 300px; height:300px;"></div>
                            <div id="pushpinDrag" style="display:none;"> drag</div>
                            <div id="pushpinDragEnd" style="display:none;">dragend</div>
                            <div id="pushpinDragStart" style="display:none;">dragstart</div>
                            <!-- <div>Pin Location: <span id="pushpinLocation"></span></div> -->
                          
                            <form action="#" method="post">
                              <input type="hidden" id="searchid" name="searchid" value="map">
                              <input type="hidden" id="lat1" name="lat1" required>
                              <input type="hidden" id="lon1" name="lon1" required>

                              
                              <button type="submit" value="send" class="btn btn-primary btn-sm">Search this location</button>
                              <!-- <a href="post_jobfinish.php?jobid=<?php echo $pid; ?>" class="btn btn-primary">Next -> Set Drop Location </a> -->
                  
                            </form>

                          <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button> -->
                      </div>
                  </div>
              </div>
          </div>
          <!-- Common Area Top ------------------ -->



               
        <form class="form-inline" action="#" method="GET">

          <input type="hidden" id="searchid" name="searchid" value="no-map">      
          <!--<div class="form-group mx-sm-2 ">            
            <select class="form-control " style="width: 150px;  height: 40px; " name="cat" value="<?php echo $cat1 ?>" placeholder="Category">
              <option value='' <?php if ($cat1=='') echo 'selected'; ?> >All</option>	
              <option value='JOB'  <?php if ($cat1=='JOB') echo 'selected'; ?>>Shipping</option>	
              <option value='BOOK' <?php if ($cat1=='BOOK') echo 'selected'; ?>>For Rent</option>	
              <option value='SALE' <?php if ($cat1=='SALE') echo 'selected'; ?>>For Sale</option>	
            </select>
          
          </div>&nbsp; -->

          <div class="form-group mx-sm-2">
            <input type="text" class="form-control" style="width: 150px; height: 40px;" name="City1" value="<?php echo $City1 ?>" placeholder="City" >
          </div>
          
          <!--
          <div class="form-group mx-sm-2 ">
           
            <input type="text" class="form-control" style="width: 150px; margin-left:4px;" name="City2" value="<?php echo $City2 ?>" placeholder="Drop City">
          </div>
          
          
          <div class="form-group mx-sm-2 ">
            <input type="date" class="form-control" style="width: 180px;" name="Date1" value="<?php echo $Date1 ?>" placeholder="From Date">
          </div>
          -->
          <div class="form-group mx-sm-2">
              &nbsp;<button type="submit" class="btn btn-primary  mx-sm-3" style="height: 40px; padding-top: 11px; padding-left: 25px; width: 50px;"><i class="ti-search mr-1 "></i></button>
          </div>
        </form>
        
      </div>
     

      <!-- <div class="col-md-4">
      </div> -->

    </div>
  </div>
</section>



<!-- Job List ------------------------------------ -->
<section class="section-sm" style="padding: 2px;">
  <div class="container" >
    
 
  <div class="row" style="padding: 2px;">
     
      <div class="col-md-12" style="padding: 2px;">

  <!-- Category List ----------------------------------------------------------------------------------------- -->

      <nav class="navbar navbar-light navbar-expand-sm " id="myNavbar" style="padding: 0px;" >        
        
        <div class="navbar-header " id="mainNav" style="padding: 0px;">

       
          <ul class="navbar-brand ml-auto nav-fill" style="padding: 0px;">
        
         
          
            <li class="navbar-brand px-4 dropdown"  style="padding: 0px;">
              <!-- <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #fff; font-size: 14px;">All Categories</a> -->
              <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #000; font-size: 14px;">Category</a>
                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="servicesDropdown" style="margin-top: -30px; background-color: #efefef;" >
                
                
                  <!-- <a class="dropdown-item" href="#">Shipping Category</a> 
                  <div class="dropdown-divider"></div> -->
                  <div class="d-md-flex align-items-start justify-content-start">
                    
                    <div>   
                      <div class="dropdown-header" style="font-size: 12px; padding-right: 20px;padding-bottom: 10px; "><b>Shipping</b></div>
                        <?php
                      
                          require('db.php');
                          $sql1="SELECT * FROM categories where main_cat=1" ;
                          $result1 = $conn->query($sql1);
                          while($row1 = $result1->fetch_assoc())
                          {
                              $id=$row1['cat_id'];       $cat=$row1['cat_title'];
                              ?>
                          <a class="dropdown-item" href="?cat=job&id=<?php echo $id; ?>" style="font-size: 12px; padding-right: 20px;padding-bottom: 10px; "><?php echo $cat; ?></a>
                              <?php
                          }
                          
                        ?>
                      <!-- </div>

                      <div>   
                        <div class="dropdown-header" style="font-size: 12px; padding-right: 20px;padding-bottom: 10px; "><b></b></div> -->
                        <?php
                      
                          require('db.php');
                          $sql1="SELECT * FROM categories where main_cat=2" ;
                          $result1 = $conn->query($sql1);
                          while($row1 = $result1->fetch_assoc())
                          {
                              $id=$row1['cat_id'];       $cat=$row1['cat_title'];
                              ?>
                          <a class="dropdown-item" href="?cat=job&id=<?php echo $id; ?>" style="font-size: 12px; padding-right: 20px;padding-bottom: 10px;"><?php echo $cat; ?></a>
                              <?php
                          }
                          
                        ?>
                      </div>

                      <div>   
                        <div class="dropdown-header" style="font-size: 12px; padding-right: 20px;padding-bottom: 10px; "><b>Shipping </b></div>
                        <?php
                      
                          require('db.php');
                          $sql1="SELECT * FROM categories where main_cat=3" ;
                          $result1 = $conn->query($sql1);
                          while($row1 = $result1->fetch_assoc())
                          {
                              $id=$row1['cat_id'];       $cat=$row1['cat_title'];
                              ?>
                          <a class="dropdown-item" href="?cat=job&id=<?php echo $id; ?>" style="font-size: 12px; padding-right: 20px;padding-bottom: 10px;"><?php echo $cat; ?></a>
                              <?php
                          }
                          
                        ?>
                      <!-- </div>

                      <div>   
                        <div class="dropdown-header" style="font-size: 12px; padding-right: 20px;padding-bottom: 10px; "><b></b></div> -->
                        <?php
                      
                          require('db.php');
                          $sql1="SELECT * FROM categories where main_cat=4" ;
                          $result1 = $conn->query($sql1);
                          while($row1 = $result1->fetch_assoc())
                          {
                              $id=$row1['cat_id'];       $cat=$row1['cat_title'];
                              ?>
                          <a class="dropdown-item" href="?cat=job&id=<?php echo $id; ?>" style="font-size: 12px; padding-right: 20px;padding-bottom: 10px; "><?php echo $cat; ?></a>
                              <?php
                          }
                          
                        ?>
                      </div>

                      <div>   
                        <div class="dropdown-header" style="font-size: 12px; padding-right: 20px;padding-bottom: 10px; "><b>Shipping</b></div>
                        <?php
                      
                          require('db.php');
                          $sql1="SELECT * FROM categories where main_cat=5" ;
                          $result1 = $conn->query($sql1);
                          while($row1 = $result1->fetch_assoc())
                          {
                              $id=$row1['cat_id'];       $cat=$row1['cat_title'];
                              ?>
                          <a class="dropdown-item" href="?cat=job&id=<?php echo $id; ?>" style="font-size: 12px; padding-right: 20px;padding-bottom: 10px;"><?php echo $cat; ?></a>
                              <?php
                          }
                          
                        ?>
                      <!-- </div>

                      <div>   
                        <div class="dropdown-header" style="font-size: 12px; padding-right: 20px;padding-bottom: 10px; "><b></b></div> -->
                        <?php
                      
                          require('db.php');
                          $sql1="SELECT * FROM categories where main_cat=6" ;
                          $result1 = $conn->query($sql1);
                          while($row1 = $result1->fetch_assoc())
                          {
                              $id=$row1['cat_id'];       $cat=$row1['cat_title'];
                              ?>
                          <a class="dropdown-item" href="?cat=job&id=<?php echo $id; ?>" style="font-size: 12px; padding-right: 20px;padding-bottom: 10px; "><?php echo $cat; ?></a>
                              <?php
                          }
                          
                        ?>
                      </div>

                      <div>   
                        <div class="dropdown-header" style="font-size: 12px; padding-right: 20px;padding-bottom: 10px; "><b>Rent</b></div>
                        <?php
                      
                          require('db.php');
                          $sql1="SELECT * FROM vehicle_cat " ;
                          $result1 = $conn->query($sql1);
                          while($row1 = $result1->fetch_assoc())
                          {
                              $cat=$row1['vcat'];
                              ?>
                          <a class="dropdown-item" href="?cat=book&id=<?php echo $cat; ?>" style="font-size: 12px; padding-right: 20px;padding-bottom: 10px; "><?php echo $cat; ?></a>
                              <?php
                          }
                          
                        ?>
                      </div>

                      <div>   
                        <div class="dropdown-header" style="font-size: 12px; padding-right: 20px;padding-bottom: 10px; "><b>Sale</b></div>
                        <?php
                      
                          require('db.php');
                          $sql1="SELECT * FROM vehicle_cat " ;
                          $result1 = $conn->query($sql1);
                          while($row1 = $result1->fetch_assoc())
                          {
                              $cat=$row1['vcat'];
                              ?>
                          <a class="dropdown-item" href="?cat=sale&id=<?php echo $cat; ?>" style="font-size: 12px; padding-right: 20px;padding-bottom: 10px;"><?php echo $cat; ?></a>
                              <?php
                          }
                          
                        ?>
                    </div>
                
                  </div>
              </div>


            </li>

            <a href="index.php?cat=" style="color: #000; font-size: 14px;" class="navbar-brand">All</a>
            <a href="index.php?cat=job" style="color: #000; font-size: 14px;" class="navbar-brand">Ship</a>
            <a href="index.php?cat=book" style="color: #000; font-size: 14px;" class="navbar-brand">Rent</a>
            <a href="index.php?cat=sale" style="color: #000; font-size: 14px;" class="navbar-brand">Sale</a>


          </ul>
        </div>
        
      </nav>
    <!-- Category List ----------------------------------------------------------------------------------------- -->
      </div>

    
    </div>
    <!--
    <div class="row">
      <div class="col-12">
        <div class="d-flex align-items-center section-title justify-content-between">
          <h3 class="mb-0 text-nowrap mr-3">Latest Job</h3>
          <div class="border-top w-100 border-primary d-none d-sm-block"></div>
          <div>
            <a href="Job_list.php" class="btn btn-sm btn-primary-outline ml-sm-3 d-none d-sm-block">see all</a>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Jobs list -->

   <div class="row justify-content-center">

      <?php
      //$_SESSION['pgcnt'] = 8;
          //if(!isset($_SESSION['pgcnt'])){
          //  $_SESSION['pgcnt'] = 4;
          //}

          if(isset($_REQUEST['pgcntplus'])){
            $_SESSION['pgcnt'] += 12;
          }
          else{
            $_SESSION['pgcnt'] = 12;
          }

          $pgcnt = $_SESSION['pgcnt'];

          require('db.php');
          
          $sql1="SELECT * FROM products $Query1 ORDER BY product_id DESC Limit $pgcnt" ;
          
          if ($searchid == "map"){
            $sql1="SELECT
            *, (
              3959 * acos (
              cos ( radians($lat1) )
              * cos( radians( pick_lat ) )
              * cos( radians( pick_lon ) - radians($lon1) )
              + sin ( radians($lat1) )
              * sin( radians( pick_lat ) )
            )
        ) AS distance
        FROM products
        Where status1='Posted' 
        HAVING distance < 50
        ORDER BY product_id DESC
        LIMIT $pgcnt" ;
          }
          
          // $lat1 = $_POST['lat1'];
          // $lon1 = $_POST['lon1'];


          
          
          
          //echo $sql1;
          //$sql1="SELECT * FROM products $Query1 ORDER BY product_id DESC Limit $record_index, $limit" ;
          
          //$sql1="SELECT * FROM products Where status1='Posted' AND typepost='JOB' ORDER BY product_id DESC Limit 12" ;
          
          $result1 = $conn->query($sql1);

      $cccnt = 0;
      while($row1 = $result1->fetch_assoc())  {
        $cccnt++;
            //  product_title, PCity, Pdate,   DCity,   DDate, product_cat, product_price, product_keywords, pweight, num_pack, product_desc, product_image, img2, img3, img4,  status1
              $pid1 =$row1['product_id'];
              $img1 =$row1['product_image'];
              $tit1 =$row1['product_title'];
              $pri1 =$row1['product_price'];
              $PCity =$row1['PCity'];
              $DCity =$row1['DCity'];
              $Pdate = $row1['PDate'];
              $typepost = $row1['typepost'];

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



    <!-- mobile see all button -->
    <?php 
    if ($cccnt >= $pgcnt){
      ?>
    
    <div class="row">
      <div class="col-12 text-center">
      <!-- <a href="Job_list.php" class="btn btn-sm btn-primary-outline d-sm-none d-inline-block">sell all</a> -->  
      <a href="index.php?pgcntplus=12" class="btn btn-sm btn-primary-outline " style="margin-bottom: 25px;">see more</a>
      
      </div>
    </div>

    <?php } else { ?>


    <div class="row">
      <div class="col-12 text-center">
      <!-- <a href="Job_list.php" class="btn btn-sm btn-primary-outline d-sm-none d-inline-block">sell all</a> -->  
      <span class="btn btn-sm btn-primary-outline " style="margin-bottom: 25px;">no more data</span>
      </div>
    </div>
    <?php }  ?>

  </div>
</section>



<!-- transporter join ------------------------------------ -->
<section class="overlay" style="padding: 40px; background: url(images/backgrounds/aaa2.jpg) no-repeat center center;">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center"><h2 class="section-title text-white">Click to join as Transporter</h2>
        <a href="TSignup.php" class="btn btn-secondary">join now</a>
      </div>
    </div>
  </div>
</section>






<!-- Vehicle List -------------------------------------------------------------- 
<section class="section-sm">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="d-flex align-items-center section-title justify-content-between">
          <h3 class="mb-0 text-nowrap mr-3">Search Vehicles</h3>
          <div class="border-top w-100 border-primary d-none d-sm-block"></div>
          <div>
            <a href="vehicle_list.php" class="btn btn-sm btn-info-outline ml-sm-3 d-none d-sm-block">see all</a>
          </div>
        </div>
      </div>
    </div>
  
  <div class="row justify-content-center">

  <?php
			
			require('db.php');
			
			//$sql1="SELECT * FROM vehicles Where status1='Posted' ORDER BY product_id DESC Limit 8" ;
			$sql1="SELECT * FROM products Where status1='Posted' AND typepost='BOOK' ORDER BY product_id DESC Limit 8" ;
			
			$result1 = $conn->query($sql1);

			
			 while($row1 = $result1->fetch_assoc())
			  {
        //  product_title, PCity, Pdate,   DCity,   DDate, product_cat, product_price, product_keywords, pweight, num_pack, product_desc, product_image, img2, img3, img4,  status1
			  	$pid1 =$row1['product_id'];
			  	$tit1 =$row1['product_title'];
          $PCity =$row1['PCity'];
          $PDate =$row1['PDate'];
          $mselfdriving =$row1['mselfdriving'];
         

				
				?>
  <?php
                      /*  
                        $sql222="SELECT product_id FROM product_seller Where product_id=$pid1" ;
                        $result222 = $conn222->query($sql222);
                  
                          $num222=0;
                          while($row222 = $result222->fetch_assoc())
                          {
                              $num222++;
                          }
                          */
                          ?>
  
  <div class="col-lg-3 col-sm-6 mb-5">
    <div class="card p-0 border-primary rounded-0 hover-shadow">
      <img class="card-img-top rounded-0 watermark" style="height: auto; width: 100%; object-fit: cover;  height:200px; "src="assets/images/<?php echo $pid1; ?>_1.png?t=<?php echo filemtime('assets/images/'.$pid1.'_1.png'); ?>" alt="trueshipp">
      <img style="position:relative; top: -15px; width: 80px;" src="images/logo50.png">
      <div class="card-body">
        <ul class="list-inline mb-2">
          <li class="list-inline-item"><a class="text-color" >Month: <?php echo $mselfdriving; ?></a></li>
        </ul>
          <h4 class="card-title"><?php echo $PCity; ?></h4> 
       
        
        <a href="vehicle_detail.php?jobid=<?php echo $pid1; ?>" class="btn btn-info btn-sm">Vehicle Detail</a>
        
        
      </div>
    </div>
  </div>

          <?php   }   ?>  

  </div>



    
    <div class="row">
      <div class="col-12 text-center">
      <a href="vehicle_list.php" class="btn btn-sm btn-info ">see all</a>
      </div>
    </div>
  </div>
</section>
-->


<br><br>

<!-- Mobile App ------------------------------------ -->
<section class="soverlay">
  <div class="container">
    <div class="row align-items-center">
      
      <div class="col-md-12 order-1 order-md-2 mb-8 mb-md-0">
        <!-- <a href="http://localhost/trueshipp/app/TrueShipp.apk"> -->
        
        <a target="_blank"  href="https://play.google.com/store/apps/details?id=com.trueshipp">
        <img class="img-fluid w-100" src="images/playstore.png" alt="about image">
        </a>
      </div>
    </div>
  </div>
</section>

<br><br>



<!-- ---------------------------- Google Adsence ---------------------------------

<section class="section">
  <div class="container">
    <div class="row align-items-center">      
      <div class="col-md-12 order-1 order-md-2 mb-8 mb-md-0" style="border: 1px solid #eee; ">

      <div id='afscontainer1'></div>

      <script type="text/javascript" charset="utf-8">

        var pageOptions = {
          "pubId": "pub-9616389000213823", // Make sure this the correct client ID!
          "query": "hotels",
          "adPage": 1
        };

        var adblock1 = {
          "container": "afscontainer1",
          "width": "700",
          "number": 1
        };

        _googCsa('ads', pageOptions, adblock1);

      </script>


      </div>
    </div>
  </div>
</section>
-->


<!-- Message to unverified users ------------------------------------ -->
<?php
if (isset($_SESSION["uname"])){
  if ( $_SESSION["verify"] != "Verify" ){
?>

<div class="navbar" style="justify-content: center; background-color: #b4465f; color: #ffffff; z-index: 1000;  overflow: hidden;   position: fixed;   bottom: 0;   width: 100%;">
Please update required information in True Shipp agreemnet. &nbsp;<a href="http://localhost/trueshipp/pages/transporter/setting.php" style="background-color: #ffffff; color: #b4465f; text-align:center; padding: 2px 5px 2px 5px; border-radius: 5px;" >HERE</a>
</div>

<?php

  }
}
?>

<!-- Common Area Bottom ----------------------- -->
<!-- footer -->
<?php 
include("footer.php");
?>

<script src="maintainscroll.js"></script>


<!--  ------------------------------------------- Map Pickup Location ------------------ -->
<script type='text/javascript'>
    var map;

    function GetMap() {
        map = new Microsoft.Maps.Map('#myMap', {});

        var center = map.getCenter();
        
        var greenPin = new Microsoft.Maps.Pushpin(new Microsoft.Maps.Location(center.latitude, center.longitude ), { color: '#f00', draggable: true });
        map.entities.push(greenPin);

        document.getElementById('lat1').value = center.latitude.toString();
        document.getElementById('lon1').value = center.longitude.toString();


        Microsoft.Maps.Events.addHandler(greenPin, 'drag', function (e) { highlight('pushpinDrag', e); });
        Microsoft.Maps.Events.addHandler(greenPin, 'dragend', function (e) { highlight('pushpinDragEnd', e); });
        Microsoft.Maps.Events.addHandler(greenPin, 'dragstart', function (e) { highlight('pushpinDragStart', e); });

        
    }

    function highlight(id, event) {
        //Highlight the mouse event div to indicate that the event has fired.
        document.getElementById(id).style.background = 'LightGreen';

        //document.getElementById('pushpinLocation').innerText = event.target.getLocation().toString();
        document.getElementById('lat1').value = event.target.getLocation().latitude.toString();
        document.getElementById('lon1').value = event.target.getLocation().longitude.toString();

        //Remove the highlighting after a second.
        setTimeout(function () { document.getElementById(id).style.background = 'white'; }, 1000);
    }
    </script>
    <script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=Alt4pMIelko3RclrRrokx2IhE1sFyoZen-iWXct9urb5G61DUVjMPPW8DzehK9fK' async defer></script>

</body>
</html>