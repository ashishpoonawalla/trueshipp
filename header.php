<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>True Shipp</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <!-- slick slider -->
  <link rel="stylesheet" href="plugins/slick/slick.css">

  <!-- animation css -->
  <link rel="stylesheet" href="plugins/animate/animate.css">
  <!-- aos -->
  <link rel="stylesheet" href="plugins/aos/aos.css">
  <!-- venobox popup -->
  <link rel="stylesheet" href="plugins/venobox/venobox.css">

  <!-- Main Stylesheet -->
  <link href="css/style.css" rel="stylesheet">

  <link href="chatbox.css" rel="stylesheet">

  <!--Favicon-->
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
  <link rel="icon" href="images/favicon.png" type="image/x-icon">  

  <script async="async" src="https://www.google.com/adsense/search/ads.js"></script>

<!-- other head elements from your page -->

<script type="text/javascript" charset="utf-8">
(function(g,o){g[o]=g[o]||function(){(g[o]['q']=g[o]['q']||[]).push(
  arguments)},g[o]['t']=1*new Date})(window,'_googCsa');
  
</script>

<script data-ad-client="ca-pub-9883400584640219" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<!-- <script type="text/javascript" charset="utf-8">
    document.addEventListener('contextmenu', event => event.preventDefault());
  </script> --> 


<style>
   @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);


/****** Style Star Rating Widget *****/

.rating { 
  border: none;
  float: left;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
 float: right; 
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #f27c00;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color:#ffc107;  } 
   
   
/* ------------------------------------ style for bottom menu ------------- */
.nav12 {
    position: fixed;
    bottom: 0;
    width: 100%;
    height: 50px;
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
    background-color: #ffffff;
    display: flex;
    overflow-x: auto;
}

.nav__link {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    flex-grow: 1;
    min-width: 50px;
    overflow: hidden;
    white-space: nowrap;
    font-family: sans-serif;
    font-size: 13px;
    color: #444444;
    text-decoration: none;
    -webkit-tap-highlight-color: transparent;
    transition: background-color 0.1s ease-in-out;
}

.nav__link:hover {
    background-color: #eeeeee;
}

.nav__link--active {
    color: #009578;
}

.nav__icon {
    font-size: 18px;
}

@media screen and (max-width: 4000px) {
  .nav12 {display: none;position: absolute;}
  
}
@media screen and (max-width: 990px) {
    .nav12 {display: flex;position: fixed;}
  
}


/* ------------------------------------ style for banner  ------------- */






/* .image-sliderfade
{
display: none;
} */

/* img
{
vertical-align: middle;
} */

/* Slideshow container */
/* .container
{
max-width: 1000px;
position: relative;
margin: auto;
} */

/* Caption text */
/* .text
{
color: #f2f2f2;
font-size: 15px;
padding: 20px 15px;
position: absolute;
right: 10px;
bottom: 10px;
width: 40%;
background: rgba(0, 0, 0, .7);
text-align: left;
} */

/* The dots/bullets/indicators */
.dot
{
height: 15px;
width: 15px;
margin: 0 2px;
background-color: transparent;
border-color: #ddd;
border-width: 5 px;
border-style: solid;
border-radius: 50%;
/* display: inline-block; */
display: none;
transition: border-color 0.6s ease;

}

.active
{
border-color: #666;
}

/* Animation */
.fade
{
-webkit-animation-name: fade-image;
-webkit-animation-duration: 4s;
animation-name: fade-image;
animation-duration: 4s;
}

@-webkit-keyframes fade-image
{
from {opacity: .4}
to {opacity: 1}
}

@keyframes fade-image
{
from {opacity: .5}
to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px)
{
.text {font-size: 11px}
}



/* ------------------------------------ style end ------------- */
</style>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.mySlides {display:none;}
</style>




  <!-- themefy-icon -->
  <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">

</head>

<body>
<?php 
/*
if($_SERVER["SCRIPT_URI"] == "http://www.trueshipp.com/index.php" || $_SERVER["SCRIPT_URI"] == "https://trueshipp.com/index.php" || $_SERVER["SCRIPT_URI"] == "http://www.trueshipp.com/"){
  header('Location: https://www.trueshipp.com/index.php');
}
*/

/*
if($_SERVER["HTTPS"] != "on")
{
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit();
}
*/
if( !headers_sent() && '' == session_id() ) {
session_start();
}



?>


<!-- ---------------------------- Notifications --------------------- -->
<div id="notify" ></div>

<script src="https://cdn.jsdelivr.net/npm/@reliutg/buzz-notify/index.min.js"></script>

<script>
  
  function createNotification(msg) {
    Notify({ position: 'bottom left',type: 'danger', duration: 4000, title: msg  });
    
  }
</script>
<!-- ---------------------------- Notifications End --------------------- -->




<!-- header -->
<header class="fixed-top header">
  <!-- top header -->
 
  <!-- navbar -->
  <div class="navigation w-100">
    <div class="container">
      <!-- <nav class="navbar navbar-expand-lg navbar-dark p-0">  -->
      <nav class="navbar navbar-expand-lg navbar-dark p-0">
        <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="logo"></a>
        <button class="navbar-toggler rounded-0" type="button" data-toggle="collapse" data-target="#navigation"
          aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navigation" >
          <ul class="navbar-nav ml-auto text-center " style="border-bottom-left-radius: 0px; ">
          <!-- <ul class="navbar-nav ml-auto text-center " > -->
            


            <!--
            <li class="nav-item ">
              <a class="nav-link" href="post_job.php">Post Job</a>
            </li>
            -->





            <!-- <li class="nav-item ">
              <a class="nav-link" href="vehicle_list.php">Vehicle</a>
            </li> -->
           






            <li class="nav-item dropdown view">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <?php
                
                if (isset($_SESSION["uname"])){
                  $un = $_SESSION["uname"];
                  ?>
                  <img src="./assets/imagesu/<?php echo $un; ?>.jpg?t=<?php echo filemtime('./assets/imagesu/'.$un.'.jpg'); ?>" style="height: 25px; width: 25px; border-radius:30px;  object-fit: cover;">&nbsp;
                  <?php
                  //echo "<img src='assets/imagesu/$un.jpg' style='height: 20px; border-radius:30px;' />&nbsp;";
                  $nm1 = $_SESSION["full_name"];
                  $nm2 = explode(" ",$nm1);
                  echo $nm2[0];
                  
                }else{
                  echo "Transporter";
                }
                 ?>

              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="transports.php">Search</a>
                <?php
                if (isset($_SESSION["uname"])){   ?>
                  <a class="dropdown-item" href="TDash.php">Dashboard</a>
                  <a class="dropdown-item" href="Logout.php">Logout</a>
                <?php  }else{
                 ?>
                <a class="dropdown-item" href="TLogin.php">Login</a>
                <a class="dropdown-item" href="TSignup.php">Signup</a>
               <?php   }  ?>
              </div>
            </li>






            <!-- <li class="nav-item @@courses">
              <a class="nav-link" href="browse.php">Browse</a>
            </li> -->



            <!--
            <li class="nav-item @@events">
              <a class="nav-link" href="Job_list.php">Projects</a>
            </li>
            -->       



            
            <li class="nav-item dropdown view">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Update
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">

              <?php
              
              require('db.php');
              
              // $sql1="SELECT * FROM products Where status1 = 'Posted' AND typepost='JOB' ORDER BY product_id DESC Limit 8" ;
              $sql1="SELECT * FROM products Where status1 = 'Posted' ORDER BY product_id DESC Limit 8" ;
              
              $result1 = $conn->query($sql1);

              
              while($row1 = $result1->fetch_assoc())
                {
                //  product_title, PCity, Pdate,   DCity,   DDate, product_cat, product_price, product_keywords, pweight, num_pack, product_desc, product_image, img2, img3, img4,  status1
                  $pid1 =$row1['product_id'];
                  $img1 =$row1['product_image'];
                  $tit1 =$row1['product_title'];
                  $pri1 =$row1['product_price'];
                  $PCity =$row1['PCity'];
                  $DCity =$row1['DCity'];
                  $Pdate = $row1['PDate'];
                  $typepost = $row1['typepost'];

                  $theDate    = new DateTime($Pdate);
                  $stringDate = $theDate->format('Y-M-d');
                  list($year,$month,$day) = explode("-",$stringDate);
                  $st1 =  $day .'.'. $month ;

                  if ($typepost == "JOB"){
                ?>

                    <a class="dropdown-item" style="color: red;" href="Job_detail.php?jobid=<?php echo $pid1; ?>"><?php echo $st1; ?> # <?php echo $PCity; ?> - <?php echo $DCity; ?></a>
                        
                <?php  } else { 
                  
                  $tp = "skyblue";
                  if ($typepost == "SALE"){
                    $tp = "orange";
                  }
                  
                  ?>

                    <a class="dropdown-item" style="color: <?php echo $tp; ?>;" href="vehicle_detail.php?jobid=<?php echo $pid1; ?>"><?php echo $PCity; ?> # <?php echo $tit1; ?></a>
                        
                <?php } 
                
                }
                ?>
               
              </div>
            </li>








              <?php 
                //------------------------------------------------------ Notification           
                  $cnt112=0;

                  if(isset( $_SESSION["uname"]))
                      $un24 =  $_SESSION["uname"];
                  else if(isset( $_SESSION["username"]))
                      $un24 = $_SESSION["username"];	
                  else
                      $un24 = "";

                    if ($un24 != ""){

                    require('db.php');

                      if ($un24 != ""){

                        $sql112="SELECT * FROM notifications Where ruid='$un24' AND status1='N'" ;
                        // $sql112="SELECT * FROM notifications Where ruid='$un24' LIMIT 5" ;

                        $result112 = $conn->query($sql112);

                        $cnt112=0;
                        while($row112 = $result112->fetch_assoc())
                        {
                          $cnt112++;
                          
                          $nmessage = $row112['nmessage'];
                          $jobid = $row112['jobid'];
                          $sfnm = $row112['sfnm'];
                          $ntype = $row112['ntype'];
                          
                          if (isset($abc)){
                            echo "<script>createNotification('$sfnm : $nmessage - $ntype '); myaudio.play(); </script>";
                          }
                          //echo "<script>createNotification('$sfnm bid on $ntype #$jobid');</script>";
                          ?>
                          <!-- <audio  id="audioID" src="images/notification.mp3" controls="" autoplay="autoplay" hidden ></audio> -->
                          
                          <?php

                        }

                      
                      ?>
                      

                      <li class="nav-item dropdown view">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                          aria-haspopup="true" aria-expanded="false">
                          <img src="images/bell00.png">
                          
                          <span                 
                            <?php if ($cnt112==0){ ?>
                              class="badge badge-success" 
                            <?php }else{  ?>  
                              class="badge badge-danger"
                            <?php } ?> 
                              style="position:absolute ;margin-top: -8px; margin-left: -11px; font-size: 10px; border-radius: 10px;">
                            
                              <?php echo $cnt112; ?>
                          </span> 
                        
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                          <?php
                              require('db.php');
                              $sql112="SELECT * FROM notifications Where ruid='$un24' limit 6" ;
                                              
                                $result112 = $conn->query($sql112);
                
                                $cnt112=0;
                                while($row112 = $result112->fetch_assoc())
                                {
                                  $cnt112++;
                                  $nid =$row112['nid'];
                                  $nmessage = $row112['nmessage'];
                                  $jobid = $row112['jobid'];
                                  $sfnm = $row112['sfnm'];
                                  $ntype = $row112['ntype'];
                                  
                                  
                                  ?>
                                  <a class="dropdown-item" href='notifications1.php?nid=<?php echo $nid; ?>&jobid=<?php echo $jobid;?>&ntype=<?php echo $ntype; ?>'>
                                    <?php echo $ntype; ?> #<?php echo $jobid; ?> - <?php echo $nmessage; ?>
                                  </a>
                                    <!-- <a href='notifications1.php?nid=<?php echo $nid; ?>&jobid=<?php echo $jobid;?>&ntype=<?php echo $ntype; ?>' > -->
                                  <?php
                
                                }
                
                              
                          ?>


                                  <a class="dropdown-item" href='notifications.php'>
                                    See all 
                                  </a>

                        </div>
                      </li>

                    <?php } ?> 
                    

                  <?php   }   ?>
















            <?php 
            //--------------------------------------------------------- Email            
              $cnt112=0;

              if(isset( $_SESSION["uname"]))
                  $un24 =  $_SESSION["uname"];
              else if(isset( $_SESSION["username"]))
                  $un24 = $_SESSION["username"];	
              else
                  $un24 = "";

                if ($un24 != ""){
                  ?>

                  <li class="nav-item @@blog">

                  <?php
                  
                    require('db.php');

                    if ($un24 != ""){
                    $sql112="SELECT DISTINCT psid FROM chat Where ruid='$un24' AND status1='N'" ;
                    //$sql112="SELECT DISTINCT psid FROM chat Where ruid='$un24' AND status1='N'" ;
                  
                    $result112 = $conn->query($sql112);

                    $cnt112=0;
                    while($row112 = $result112->fetch_assoc())
                    {
                      
                      $cnt112++;
                      
                    }

                  
                  ?>
                  <a class="nav-link" href="message.php"><img src="images/Message-box.png" style="margin-top: -2px;">
                    <span 
                    
                    <?php if ($cnt112==0){ ?>
                      class="badge badge-success" 
                    <?php }else{  ?>  
                      class="badge badge-danger"
                    <?php } ?> 
                      style="position:absolute ;margin-top: -8px; margin-left: -8px; font-size: 10px;  border-radius: 10px;">
                    
                      <?php echo $cnt112; ?>
                    </span></a>
                  <?php } ?> 
                  </li>

                <?php   }   ?>





            <!-- ----------------------------------------------- USers ------------------- -->


            <li class="nav-item dropdown view">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <?php
                
                if (isset($_SESSION["username"])){
                  $un = $_SESSION["username"];
                  ?>
                  <img src="./assets/imagesu/<?php echo $un; ?>.jpg?t=<?php echo filemtime('./assets/imagesu/'.$un.'.jpg'); ?>" style="height: 25px; width: 25px; border-radius:30px; object-fit: cover;">&nbsp;

                  <?php
                  //echo "<img src='assets/imagesu/$un.jpg' style='height: 20px; border-radius:30px;' />&nbsp;";
                  
                  $nm1 = $_SESSION["first_name"];
                  $nm2 = explode(" ",$nm1);
                  echo $nm2[0];


                }else{
                  echo "User";
                }
                 ?>

              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php
                
                if (!isset($_SESSION["username"])){
                  ?>
                  <!--
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#loginModal">Login</a>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#signupModal">Signup</a>
                  -->
                  <a class="dropdown-item" href="ULogin.php" >Login</a>
                  <a class="dropdown-item" href="USignup.php" >Signup</a>

                  <?php
                }else{
                  ?>
                  <!-- <a class="dropdown-item" href="my_account.php">My Account</a>                  -->
                  <a class="dropdown-item" href="my_jobs.php">My Jobs</a>
                  <a class="dropdown-item" href="my_awarded.php">Awarded</a>
                  <a class="dropdown-item" href="my_delivered.php">Delivered</a>
                  <a class="dropdown-item text-info" href="my_rent.php">Vehicles</a>
                  <a class="dropdown-item" href="transactions.php">Transaction</a>                 
                  <a class="dropdown-item" href="setting.php">Setting</a>
                  <a class="dropdown-item" href="Logout.php">Logout</a>

                  <?php
                }
                 ?>
                
                
              </div>
            </li>






          </ul>
        </div>
      </nav>
    </div>
  </div>
</header>
<!-- /header -->



<!-- Signup Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-5 border-0 p-4">
            <div class="modal-header border-0">
                <h3>Register</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                    
              <form action="USignup.php" method="POST" data-form-title="Signup User">    
                  <div class="form-group">
                      <input type="email" class="form-control" id="uemail" name="uemail" minlength="5" maxlength="150" placeholder="Email as Username" required>
                  </div>
                  <div class="form-group">
                      <input type="password" class="form-control" id="upassword" minlength="8" maxlength="50" name="upassword" placeholder="Password" required>
                  </div>

                  <div class="form-group">
                      <input type="password" class="form-control" id="upassword2" minlength="8" maxlength="50" name="upassword2" placeholder="Confirm Password" required>
                  </div>

                  <div class="form-group">
                      <input type="text" class="form-control" id="ufullname" name="ufullname" maxlength="50" placeholder="Full Name" required>
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" id="uphone" minlength="8" name="uphone" maxlength="20" placeholder="Phone" required>
                  </div>
                 
            <input type="checkbox" id="terms" name="terms" value="Terms" required>
            <label for="vehicle1"> I agree with the <a href='https://trueshipp.com/termsofuse.php'>Terms</a> 
            & <a href='https://trueshipp.com/privacy.php'>Privacy</a> of Trueshipp</label><br>
            
                      <button type="submit" class="btn btn-primary"  >Signup Now</button>

              </form>
                
            </div>
        </div>
    </div>
</div>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-5 border-0 p-4">
            <div class="modal-header border-0">
                <h3>Login</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
            <form action="ULoginCH.php" method="POST" data-form-title="Signup User">              
              
              <div class="form-group">
                  <input type="text" class="form-control" id="uemail" name="uemail" maxlength="150" placeholder="Email" required>
              </div>
              <div class="form-group">
                  <input type="password" class="form-control" id="upassword" name="upassword" maxlength="50" placeholder="Password" required>
              </div>
              
                  <button type="submit" class="btn btn-primary"  >Login</button>
                  <br><br><a href="UForgetPassword.php"  >Change or forgot password</a>
            </form>
            </div>
        </div>
    </div>
</div>
<!-- Common Area Top ------------------ -->



