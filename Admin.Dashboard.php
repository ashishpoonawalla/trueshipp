<!DOCTYPE html>
<html>
<head>
  <!-- Site made with Mobirise Website Builder v3.6.4, # -->
  <title>trueshipp</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v3.6.4, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/images/LogoMakr_9qkixk.png" type="image/x-icon">
  <meta name="description" content="">
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:700,400&amp;subset=cyrillic,latin,greek,vietnamese">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/socicon/css/socicon.min.css">
  <link rel="stylesheet" href="assets/mobirise/css/style.css">
  <link rel="stylesheet" href="assets/mobirise-slider/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  <link rel="stylesheet" href="side_menu.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <style>
* {box-sizing: border-box}

.container1 {
  width: 100%;
  background-color: #ddd;
}

.skills {
  text-align: right;
  padding-top: 10px;
  padding-bottom: 10px;
  color: white;
}

.html {width: 90%; background-color: #4CAF50;}
.css {width: 80%; background-color: #2196F3;}
.js {width: 65%; background-color: #f44336;}
.php {width: 60%; background-color: #808080;}
</style>
  
  
  
</head>
<body>


<!-- Menu ------------------------------------------ -->
<?php

include('menuA.php');
session_start();
?>

<br><br><br><br><br><br>

<!-- Best Seller Titile ------------------------------------------ -->
<section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="index-social-buttons1-0" style="background-color: rgb(255, 255, 255);">
    

    <div class="mbr-section__container container">
        <div class="mbr-header mbr-header--inline row" style="padding-top: 13.6px; padding-bottom: 17.2px;">
            <div class="col-sm-10">
                <h3 class="mbr-header__text"><?php echo $_SESSION["StoreNM"]; ?> Dashboard</h3>
            </div>
			<div class="col-sm-2">
                <div class="mbr-buttons mbr-buttons--auto-align mbr-buttons--top mbr-buttons--left"><a class="mbr-buttons__btn btn btn-lg btn-success" href="Admin.Complaint.php">Complaint</a></div>
            </div>
			
			<!-- ----------------- Pending New Products ------------- -->
            <div class="mbr-social-icons col-sm-7">
               
			        
                   
				   
				   <br><br>
				   
				   <h3>Pending New Products</h3>

					
			<?php
			
			require('db.php');
			$sql1="SELECT * FROM products Where status1='Pending' " ;
			
			$result1 = $conn->query($sql1);

			
			 while($row1 = $result1->fetch_assoc())
			  {
			  	$pid1=$row1['product_id'];
			  	$img1=$row1['product_image'];
				$tit1=$row1['product_title'];
				$pri1=$row1['product_price'];

				
				?>
					
					
			       <a style="font-size: 16px; color: #001bb0; text-decoration: none;" target="_blank"  href="Product.php?var=<?php echo $pid1; ?>">#<?php echo $pid1; ?> - <?php echo $tit1; ?></a><br>
                
					
					
					<?php
					
				}
				
				?>
			
			
					
					
				   
				   <br><br>
				   
                    
                
            </div>


			<!-- ----------------- Sales Chart ------------- -->
			<div class="mbr-social-icons col-sm-5">
                <div class="mbr-social-likes social-likes_style-1" data-counters="false">
                    
                   
				   
				   <br><br>
				   
				   <h3>Sales Chart</h3>

					<p>Oct</p>
					<div class="container1">
					  <div class="skills html">90%</div>
					</div>

					<p>Sep</p>
					<div class="container1">
					  <div class="skills css">80%</div>
					</div>

					<p>Aug</p>
					<div class="container1">
					  <div class="skills js">65%</div>
					</div>

					<p>Jul</p>
					<div class="container1">
					  <div class="skills php">60%</div>
					</div>
				   
				   
				   <br><br>
				   
                    
                </div>
            </div>
        </div>
		

    </div>
</section>






<section class="mbr-section mbr-section--relative" id="Seller_Dashboard-msg-box4-0" style="background-color: rgb(71, 85, 119);">
    
    <div class="mbr-section__container mbr-section__container--isolated container" style="padding-top: 93px; padding-bottom: 93px;">
        <div class="row">
            <div class="mbr-box mbr-box--fixed mbr-box--adapted">
                <div class="mbr-box__magnet mbr-box__magnet--top-right mbr-section__left col-sm-6">
                    <figure class="mbr-figure mbr-figure--adapted mbr-figure--caption-inside-bottom mbr-figure--full-width"><img src="assets/images/iphone.png" class="mbr-figure__img"></figure>
                </div>
                <div class="mbr-box__magnet mbr-class-mbr-box__magnet--center-left col-sm-6 mbr-section__right">
                    <div class="mbr-section__container mbr-section__container--middle">
                        <div class="mbr-header mbr-header--auto-align mbr-header--wysiwyg">
                            <h3 class="mbr-header__text">NEW ORDER</h3>
                            
                        </div>
                    </div>
                    <div class="mbr-section__container mbr-section__container--middle">
                        <div class="mbr-article mbr-article--auto-align mbr-article--wysiwyg"><p>Make your own website in a few clicks! Mobirise helps you cut down development time by providing you with a flexible website editor with a drag and drop interface.</p></div>
                    </div>
                    <div class="mbr-section__container">
                        <div class="mbr-buttons mbr-buttons--auto-align btn-inverse"><a class="mbr-buttons__btn btn btn-lg btn-default" href="#">PROCESS ORDER</a></div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>

<!-- Footer Link ---------------------------------- -->
<?php 

include('footer.php'); 

?>



  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smooth-scroll/SmoothScroll.js"></script>
  <script src="assets/mobirise/js/script.js"></script>
  
  
</body>
</html>