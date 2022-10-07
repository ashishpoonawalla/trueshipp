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
  
</head>
<body>



<!-- Menu ------------------------------------------ -->
<?php

include('menu2.php');

?>



<?php 

$cat = $_REQUEST['var1'];

?>
<br><br><br><br><br>

<!-- Category Titile ------------------------------------------ -->
<section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="index-social-buttons1-0" style="background-color: rgb(255, 255, 255);">
    

    <div class="mbr-section__container container">
        <div class="mbr-header mbr-header--inline row" style="padding-top: 20px; padding-bottom: 0px;">
            <div class="col-sm-8">
                <h3 class="mbr-header__text">Category: <?php echo $cat; ?></h3>
            </div>
           
        </div>
    </div>
</section>

<!-- Product ------------------------------------------ -->
<section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="index-features1-0" style="background-color: rgb(255, 255, 255);">
    
    
    <div class="mbr-section__container container mbr-section__container--std-top-padding" style="padding-top: 50px;">
        <div class="mbr-section__row row">
            
			
			<?php
			
			require('db.php');
			$cid = $_REQUEST['var'];
			
			$sql1="SELECT * FROM categories Where main_cat=$cid " ;
			
			$result1 = $conn->query($sql1);

			
			 while($row1 = $result1->fetch_assoc())
			  {
			  	$pid1=$row1['cat_id'];
			  	$tit1=$row1['cat_title'];
			

				
				?>
					
					
			<div class="mbr-section__col col-xs-12 col-md-3 col-sm-6">
                
                <div class="mbr-section__container mbr-section__container--middle">
                    <div style="height: 30px"class="mbr-header mbr-header--reduce mbr-header--left mbr-header--wysiwyg">
                        <h3 class="mbr-header__text"><a style="font-size: 20px; color: #001bb0; text-decoration: none;" target="_blank"  href="ProductCat.php?var=<?php echo $pid1; ?>&var1=<?php echo $cat; ?> > <?php echo $tit1; ?>"><?php echo $tit1; ?></a></h3>
                    </div>
                </div>
			
            </div>
					
					
					<?php
					
				}
				
				?>
			
			
			
		
            
        </div>
    </div>
</section>

<br><br><br>

<!-- Footer Link ---------------------------------- -->
<?php 

include('footer.php'); 

?>



  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smooth-scroll/SmoothScroll.js"></script>
  <script src="assets/bootstrap-carousel-swipe/bootstrap-carousel-swipe.js"></script>
  <script src="assets/social-likes/social-likes.js"></script>
  <script src="assets/mobirise/js/script.js"></script>
  

  
</body>
</html>