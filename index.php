<?php

$abc = "1";
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


$_SESSION["searchid"] = $searchid = $searchBox = "";

$_SESSION["Query21"] = $Query21 = "";


if (isset($_POST['lat1']) && isset($_POST['lon1']) && isset($_POST['searchid'])) {

  $_SESSION["searchid11"] = $_POST['searchid'];
  $_SESSION["lat11"] = $_POST['lat1'];
  $_SESSION["lon11"] = $_POST['lon1'];
  $_SESSION["searchBox11"] = $_POST['searchBox'];

}

if (isset($_SESSION["searchid11"] ) && isset($_SESSION["lat11"] )  && isset($_SESSION["lon11"] )  && isset($_SESSION["searchBox11"] )  ){
  
  $searchid = $_SESSION["searchid11"];
  $lat1 = $_SESSION["lat11"];
  $lon1 =  $_SESSION["lon11"];
  $searchBox = $_SESSION["searchBox11"];

}

$Key1 = "";
$City2 = "";
$Date1 = "";
$Date2 = "";
$cat1 = "";


$numQ = 1;
$Query1 = " Where status1='Posted' ";

$Q11 = "";

if (isset($_GET['Key1'])) {
  $Key1 = $_GET['Key1'];
  if ($Key1 != '') {
    $Q11 .= "&Key1=$Key1";
    $Query1 = " WHERE product_title LIKE '%$Key1%' ";
    $numQ++;
  }
}



if (isset($_GET['cat'])) {
  $cat1 = $_GET['cat'];

  if ($cat1 != '') {
    $Q11 .= "&cat=$cat1";
    if ($numQ == 0) {
      $Query1 = " WHERE typepost='$cat1' ";
      $Query21 .= " AND typepost='$cat1' ";
      $numQ++;
    } else {
      $Query1 .= " AND typepost='$cat1' ";
      $Query21 .= " AND typepost='$cat1' ";
      $numQ++;
    }
    $_SESSION["Query21"] = $Query21;
  }
} else {
  $cat1 = "";
}



if (isset($_GET['id'])) {
  $id1 = $_GET['id'];

  
    
      $Query1 .= " AND product_cat='$id1' ";
      $numQ++;
    
  
} else {
  $id1 = "";
}
$_SESSION["Query1"] = $Query1 ;
$_SESSION["searchid"] = $searchid;
$_SESSION["featured"] = "0";
//echo $Query1;
?>


<!-- Search Bar ------------------------------------ -->
<section class="page-title-section overlay" style="background: url(images/backgrounds/tra1.jpg) no-repeat center center;">
  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <!-- Map Model --------------------  -->
        <!-- <audio id="sound1" src="images/click.mp3" preload="auto"></audio> -->

        <button href="#" data-toggle="modal" data-target="#postModal3" class="btn  mx-sm-3 float-left" style="height: 40px; padding-top: 11px; padding-left: 20px; width: 40px; margin-right: 10px; border-radius: 25px;"><i class="ti-location-pin mr-1 "></i> </button> 
        <!-- <button href="#" data-toggle="modal" data-target="#postModal3" class="btn btn-primary  mx-sm-3 float-left" style="height: 40px; padding-top: 11px; padding-left: 25px; width: 50px; margin-right: 4px; border-radius: 25px;"><i class="ti-location-pin mr-1 "></i> </button>  -->
       
       
        <!-- <button onclick="document.getElementById('sound1').play();" href="#" data-toggle="modal" data-target="#postModal3" class="btn btn-primary  mx-sm-3 float-right" style="height: 40px; padding-top: 11px; padding-left: 25px; width: 50px;"><i class="ti-location-pin mr-1 "></i> </button> -->

        <div class="modal fade" id="postModal3" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document" style="margin-top: 100px; padding: 10px;  ">
            <div class="modal-content rounded-5 border-0 p-4" style=" padding: 10px; ">
              
              <div class="modal-body">
               

                <form action="#" method="post">
                  <input type="hidden" id="searchid" name="searchid" value="map">
                  <input type="hidden" id="lat1" name="lat1" required>
                  <input type="hidden" id="lon1" name="lon1" required>
                  <div id='searchBoxContainer'>
                    <input type='text' id='searchBox' name='searchBox' placeholder='address, city' />
                  </div>

                  <div id="myMap" style="position:relative;width:100%; min-width: 300px; height:300px;"></div>

                  <button type="submit" value="send" class="btn btn-primary btn-sm">Search Now</button>
                  <a href="indexclear.php" class="btn btn-primary btn-sm">Clear</a>
                  
                </form>
                
                
             
              </div>
            </div>
          </div>
        </div>
        <!-- Common Area Top ------------------ -->




        <form class="form-inline" action="#" method="GET">

          <input type="hidden" id="searchid" name="searchid" value="map">

          <div class="form-group mx-sm-2">
            <input type="text" class="form-control" style="width: 200px; height: 40px; margin-right: -35px; border-top-left-radius: 25px; border-bottom-left-radius: 25px;" name="Key1" value="<?php echo $Key1 ?>" placeholder="">
          </div>

          <div class="form-group mx-sm-2">
          &nbsp;<button type="submit" class="btn  mx-sm-3" style="height: 40px; padding-top: 11px; padding-left: 15px; width: 50px; border-top-right-radius: 25px; border-bottom-right-radius: 25px;"><i class="ti-search mr-1 "></i></button>
          <!-- &nbsp;<button type="submit" class="btn btn-primary  mx-sm-3" style="height: 40px; padding-top: 11px; padding-left: 25px; width: 50px; "><i class="ti-search mr-1 "></i></button> -->
          </div>
          
        </form>

        <?php if ($searchBox != "" && $searchBox != null){ echo "<span style='color: white; '>📌 $searchBox</span>";} ?>
      </div>


    </div>
  </div>
</section>

<!-- Mobile App ------------------------------------ 
<section class="soverlay">
  <div class="container">
    <div class="row align-items-center">

      <div class="col-md-12 order-1 order-md-2 mb-8 mb-md-0">
       

        <a target="_blank" href="https://play.google.com/store/apps/details?id=com.trueshipp">
          <img class="img-fluid w-100" src="images/playstore.png" alt="about image">
        </a>
      </div>
    </div>
  </div>
</section>
-->

<!-- Job List ------------------------------------ -->
<section class="section-sm" style="padding: 2px;">
  <div class="container">

    <!-- ------------------------------ Category -------------------------------- -->
    <div class="row" style="padding: 2px;">

      <div class="col-md-12" style="padding: 2px;">

        <!-- Category List ----------------------------------------------------------------------------------------- -->

        <nav class="navbar navbar-light navbar-expand-sm " id="myNavbar" style="padding: 0px;">

          <div class="navbar-header " id="mainNav" style="padding: 0px;">


            <ul class="navbar-brand ml-auto nav-fill" style="padding: 0px;">



              <li class="navbar-brand px-4 dropdown" style="padding: 0px;">
                <!-- <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #fff; font-size: 14px;">All Categories</a> -->
                <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #000; font-size: 14px;">Category</a>
                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="servicesDropdown" style="margin-top: -30px; background-color: #efefef;">


                  <!-- <a class="dropdown-item" href="#">Shipping Category</a> 
                  <div class="dropdown-divider"></div> -->
                  <div class="d-md-flex align-items-start justify-content-start">

                    <div>
                      <div class="dropdown-header" style="font-size: 12px; padding-right: 20px;padding-bottom: 10px; "><b>Shipping</b></div>
                      <?php

                      require('db.php');
                      $sql1 = "SELECT * FROM categories where main_cat=1";
                      $result1 = $conn->query($sql1);
                      while ($row1 = $result1->fetch_assoc()) {
                        $id = $row1['cat_id'];
                        $cat = $row1['cat_title'];
                      ?>
                        <a class="dropdown-item" href="?cat=job&id=<?php echo $cat; ?>" style="font-size: 12px; padding-right: 20px;padding-bottom: 10px; "><?php echo $cat; ?></a>
                      <?php
                      }

                      ?>
                      <!-- </div>

                      <div>   
                        <div class="dropdown-header" style="font-size: 12px; padding-right: 20px;padding-bottom: 10px; "><b></b></div> -->
                      <?php

                      require('db.php');
                      $sql1 = "SELECT * FROM categories where main_cat=2";
                      $result1 = $conn->query($sql1);
                      while ($row1 = $result1->fetch_assoc()) {
                        $id = $row1['cat_id'];
                        $cat = $row1['cat_title'];
                      ?>
                        <a class="dropdown-item" href="?cat=job&id=<?php echo $cat; ?>" style="font-size: 12px; padding-right: 20px;padding-bottom: 10px;"><?php echo $cat; ?></a>
                      <?php
                      }

                      ?>
                    </div>

                    <div>
                      <div class="dropdown-header" style="font-size: 12px; padding-right: 20px;padding-bottom: 10px; "><b>Shipping </b></div>
                      <?php

                      require('db.php');
                      $sql1 = "SELECT * FROM categories where main_cat=3";
                      $result1 = $conn->query($sql1);
                      while ($row1 = $result1->fetch_assoc()) {
                        $id = $row1['cat_id'];
                        $cat = $row1['cat_title'];
                      ?>
                        <a class="dropdown-item" href="?cat=job&id=<?php echo $cat; ?>" style="font-size: 12px; padding-right: 20px;padding-bottom: 10px;"><?php echo $cat; ?></a>
                      <?php
                      }

                      ?>
                      <!-- </div>

                      <div>   
                        <div class="dropdown-header" style="font-size: 12px; padding-right: 20px;padding-bottom: 10px; "><b></b></div> -->
                      <?php

                      require('db.php');
                      $sql1 = "SELECT * FROM categories where main_cat=4";
                      $result1 = $conn->query($sql1);
                      while ($row1 = $result1->fetch_assoc()) {
                        $id = $row1['cat_id'];
                        $cat = $row1['cat_title'];
                      ?>
                        <a class="dropdown-item" href="?cat=job&id=<?php echo $cat; ?>" style="font-size: 12px; padding-right: 20px;padding-bottom: 10px; "><?php echo $cat; ?></a>
                      <?php
                      }

                      ?>
                    </div>

                    <div>
                      <div class="dropdown-header" style="font-size: 12px; padding-right: 20px;padding-bottom: 10px; "><b>Shipping</b></div>
                      <?php

                      require('db.php');
                      $sql1 = "SELECT * FROM categories where main_cat=5";
                      $result1 = $conn->query($sql1);
                      while ($row1 = $result1->fetch_assoc()) {
                        $id = $row1['cat_id'];
                        $cat = $row1['cat_title'];
                      ?>
                        <a class="dropdown-item" href="?cat=job&id=<?php echo $cat; ?>" style="font-size: 12px; padding-right: 20px;padding-bottom: 10px;"><?php echo $cat; ?></a>
                      <?php
                      }

                      ?>
                      <!-- </div>

                      <div>   
                        <div class="dropdown-header" style="font-size: 12px; padding-right: 20px;padding-bottom: 10px; "><b></b></div> -->
                      <?php

                      require('db.php');
                      $sql1 = "SELECT * FROM categories where main_cat=6";
                      $result1 = $conn->query($sql1);
                      while ($row1 = $result1->fetch_assoc()) {
                        $id = $row1['cat_id'];
                        $cat = $row1['cat_title'];
                      ?>
                        <a class="dropdown-item" href="?cat=job&id=<?php echo $cat; ?>" style="font-size: 12px; padding-right: 20px;padding-bottom: 10px; "><?php echo $cat; ?></a>
                      <?php
                      }

                      ?>
                    </div>

                    <div>
                      <div class="dropdown-header" style="font-size: 12px; padding-right: 20px;padding-bottom: 10px; "><b>Rent</b></div>
                      <?php

                      require('db.php');
                      $sql1 = "SELECT * FROM vehicle_cat ";
                      $result1 = $conn->query($sql1);
                      while ($row1 = $result1->fetch_assoc()) {
                        $cat = $row1['vcat'];
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
                      $sql1 = "SELECT * FROM vehicle_cat ";
                      $result1 = $conn->query($sql1);
                      while ($row1 = $result1->fetch_assoc()) {
                        $cat = $row1['vcat'];
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
   

    <!-- ------------------------------ Banner -------------------------------- -->

    <!-- Full-width images with caption text -->
    <!-- <div class="image-sliderfade fade">
      <img src="images/slider1.png" style="width:100%">
     
    </div>

    <div class="image-sliderfade fade">
      <img src="images/slider2.png" style="width:100%">
      
    </div> -->

   
    

    <!-- The dots/circles -->
    <div style="text-align:center">
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
    </div>
    <!-- --------------- Banner script---------------- -->
    <script>
    var slideIndex = 0;
    showSlides(); // call showslide method

    function showSlides()
    {
      var i;

      // get the array of divs' with classname image-sliderfade
      var slides = document.getElementsByClassName("image-sliderfade");
      
      // get the array of divs' with classname dot
      var dots = document.getElementsByClassName("dot");

      for (i = 0; i < slides.length; i++) {
        // initially set the display to
        // none for every image.
        slides[i].style.display = "none";
      }

      // increase by 1, Global variable
      slideIndex++;

      // check for boundary
      if (slideIndex > slides.length)
      {
        slideIndex = 1;
      }

      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.
                  replace(" active", "");
      }

      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " active";

      // Change image every 2 seconds
      setTimeout(showSlides, 4000);

      
    }

    </script>
    <!-- ------------------------------ Banner  End-------------------------------- -->

    <!-- ------------------------------ Products Loop --------------------------- -->
    <?php
      $_SESSION["first_time"] = "Y";
    ?>

    <!-- <div class="row justify-content-center" style="width: 100%; margin-left: -3px; margin-right: -2px; margin-top: 6px;"> -->

      <div id="load_data" class="row justify-content-center" style="width: 100%; margin-left: -3px; margin-right: -2px; margin-top: 6px;"></div>
      <div id="load_data_message"></div>

    <!-- </div> -->





    <!-- mobile see all button -->
    <?php
    // if ($cccnt >= $pgcnt) 
    {
    ?>

      <!-- <div class="row">
        <div class="col-12 text-center">
          
          <a href="index.php?pgcntplus=12" class="btn btn-sm btn-primary-outline " style="margin-bottom: 25px;">see more</a>

        </div>
      </div> -->

    <?php } 
    // else 
    { ?>


      <!-- <div class="row">
        <div class="col-12 text-center">
          
          <span class="btn btn-sm btn-primary-outline " style="margin-bottom: 25px;">no more data</span>
        </div>
      </div> -->
    <?php }  ?>

    

  </div>
</section>



<!-- transporter join ------------------------------------ -->
<section class="overlay" style="padding: 40px; background: url(images/backgrounds/aaa2.jpg) no-repeat center center;">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h2 class="section-title text-white">Click to join as Transporter</h2>
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
  $sql1 = "SELECT * FROM products Where status1='Posted' AND typepost='BOOK' ORDER BY product_id DESC Limit 8";

  $result1 = $conn->query($sql1);


  while ($row1 = $result1->fetch_assoc()) {
    //  product_title, PCity, Pdate,   DCity,   DDate, product_cat, product_price, product_keywords, pweight, num_pack, product_desc, product_image, img2, img3, img4,  status1
    $pid1 = $row1['product_id'];
    $tit1 = $row1['product_title'];
    $PCity = $row1['PCity'];
    $PDate = $row1['PDate'];
    $mselfdriving = $row1['mselfdriving'];



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
      <img class="card-img-top rounded-0 watermark" style="height: auto; width: 100%; object-fit: cover;  height:200px; "src="assets/images/<?php echo $pid1; ?>_1.png?t=<?php echo filemtime('assets/images/' . $pid1 . '_1.png'); ?>" alt="trueshipp">
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


<!--
<br><br>


<section class="soverlay">
  <div class="container">
    <div class="row align-items-center">

      <div class="col-md-12 order-1 order-md-2 mb-8 mb-md-0">
        

        <a target="_blank" href="https://play.google.com/store/apps/details?id=com.trueshipp">
          <img class="img-fluid w-100" src="images/playstore.png" alt="about image">
        </a>
      </div>
    </div>
  </div>
</section>

<br><br>
                        -->


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
if (isset($_SESSION["uname"])) {
  if ($_SESSION["verify"] != "Verify") {
?>

    <div class="navbar" style="justify-content: center; background-color: #b4465f; color: #ffffff; z-index: 1000;  overflow: hidden;   position: fixed;   bottom: 0;   width: 100%;">
    <!-- Please update required information in True Shipp agreemnet. &nbsp;<a href="http://localhost/trueshipp/pages/transporter/setting.php?ts=1" style="background-color: #ffffff; color: #b4465f; text-align:center; padding: 2px 5px 2px 5px; border-radius: 5px;">HERE</a> -->
      Please update required information in True Shipp agreemnet. &nbsp;<a href="http://localhost/trueshipp/pages/transporter/setting.php" style="background-color: #ffffff; color: #b4465f; text-align:center; padding: 2px 5px 2px 5px; border-radius: 5px;">HERE</a>
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




<!-- ------------------------------ Scroll code ------------- -->
<script>

$(document).ready(function(){
 
 var limit = 12;
 var start = 0;
 var action = 'inactive';
 function load_country_data(limit, start)
 {
  $.ajax({
   url:"index_fetch.php",
   method:"POST",
   data:{limit:limit, start:start},
   cache:false,
   success:function(data)
   {
    $('#load_data').append(data);
    if(data == '')
    {
     $('#load_data_message').html("No Data Found");
     action = 'active';
    }
    else
    {
     $('#load_data_message').html("");
     action = "inactive";
    }
   }
  });
 }

 if(action == 'inactive')
 {
  action = 'active';
  load_country_data(limit, start);
 }
 $(window).scroll(function(){
  if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
  {
   action = 'active';
   start = start + limit;
   setTimeout(function(){
    load_country_data(limit, start);
   }, 1000);
  }
 });
 
});
</script>









<script src="maintainscroll.js"></script>
<!--  ------------------------------------------- Map Pickup Location ------------------ -->


<script type='text/javascript'>
        var map;

        function GetMap()
        {
            map = new Microsoft.Maps.Map('#myMap', {});

            var center = map.getCenter();    

          document.getElementById('lat1').value = center.latitude.toString();
          document.getElementById('lon1').value = center.longitude.toString();

            Microsoft.Maps.loadModule('Microsoft.Maps.AutoSuggest', function ()
            {
                var manager = new Microsoft.Maps.AutosuggestManager({ map: map });
                manager.attachAutosuggest('#searchBox', '#searchBoxContainer', suggestionSelected);
            });
                  

        }

        function suggestionSelected(result)
        {
            //Remove previously selected suggestions from the map.
            map.entities.clear();

            //Show the suggestion as a pushpin and center map over it.
            var pin = new Microsoft.Maps.Pushpin(result.location);
            document.getElementById('lat1').value = result.location.latitude.toString();
            document.getElementById('lon1').value = result.location.longitude.toString();

            map.entities.push(pin);

            map.setView({ bounds: result.bestView });
        }
    </script>
    <script type='text/javascript'
        src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=Alt4pMIelko3RclrRrokx2IhE1sFyoZen-iWXct9urb5G61DUVjMPPW8DzehK9fK'
        async defer></script>


<!-- <script type='text/javascript'>
  var map;

  function GetMap() {
    map = new Microsoft.Maps.Map('#myMap', {});

    var center = map.getCenter();

    var greenPin = new Microsoft.Maps.Pushpin(new Microsoft.Maps.Location(center.latitude, center.longitude), {
      color: '#f00',
      draggable: true
    });
    map.entities.push(greenPin);

    document.getElementById('lat1').value = center.latitude.toString();
    document.getElementById('lon1').value = center.longitude.toString();


    Microsoft.Maps.Events.addHandler(greenPin, 'drag', function(e) {
      highlight('pushpinDrag', e);
    });
    Microsoft.Maps.Events.addHandler(greenPin, 'dragend', function(e) {
      highlight('pushpinDragEnd', e);
    });
    Microsoft.Maps.Events.addHandler(greenPin, 'dragstart', function(e) {
      highlight('pushpinDragStart', e);
    });


  }

  function highlight(id, event) {
    //Highlight the mouse event div to indicate that the event has fired.
    document.getElementById(id).style.background = 'LightGreen';

    //document.getElementById('pushpinLocation').innerText = event.target.getLocation().toString();
    document.getElementById('lat1').value = event.target.getLocation().latitude.toString();
    document.getElementById('lon1').value = event.target.getLocation().longitude.toString();

    //Remove the highlighting after a second.
    setTimeout(function() {
      document.getElementById(id).style.background = 'white';
    }, 1000);
  }
</script>
<script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=Alt4pMIelko3RclrRrokx2IhE1sFyoZen-iWXct9urb5G61DUVjMPPW8DzehK9fK' async defer></script> -->

</body>

</html>