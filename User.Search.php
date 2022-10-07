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
                   


<section class="engine"><a rel="external" href="#">free bootstrap web page maker software download</a></section><section class="mbr-section mbr-section--relative mbr-section--fixed-size mbr-after-navbar" id="page5-form1-0" style="background-color: rgb(255, 255, 255);">
    
    <div class="mbr-section__container mbr-section__container--std-padding container" style="padding-top: 20px; padding-bottom: 0px;">
        <div class="row">

 <!-- Logout Button ---------------------------------- -->
<div class="mbr-box__magnet mbr-class-mbr-box__magnet--center-left col-sm-1 mbr-section__right">
					<a class="mbr-buttons__btn btn btn-lg btn-primary" href="User.Orders.php">My Orders</a>
				    <a class="mbr-buttons__btn btn btn-lg btn-primary" href="User.Choice.php">My Store</a>
					<a class="mbr-buttons__btn btn btn-lg btn-primary" href="User.Search.php">My Search</a>				    
				    <a class="mbr-buttons__btn btn btn-lg btn-primary" href="User.Password.php">Change Password</a>
				    <a class="mbr-buttons__btn btn btn-lg btn-primary" href="Logout.php">Logout</a>
										
</div>

<br>
 <!-- Brand List ---------------------------------- -->
           
 			
         <div class="col-sm-6">
         
		 
		 <h3>Selected Brand</h3>  			   
			   
<section class="mbr-section mbr-section--relative" id="Cart-msg-box4-0" style="background-color: rgb(255, 255, 255);">
			
	<table border="0" width="90%"> 		
			
<?php
			
	//session_start();
	$uid = $_SESSION["uid"];
		
	require('db.php');	
	
	$sql5="SELECT * FROM user_choice WHERE user_id=$uid " ;
	$result5 = $conn->query($sql5);
	
	$sel_id=0;
	if (isset($_REQUEST["var5"]))
		$sel_id=$_REQUEST["var5"];
	
	$ss=0;
	
	while($row5 = $result5->fetch_assoc())
	{
		$bid = $row5["brand_id"];
		$ss++;
		
		if ($ss == 1 && $sel_id==0)
			$sel_id= $bid;			
			
			
			$sql="SELECT * FROM brands where brand_id=$bid" ;
			$result = $conn->query($sql);			
			
			if($row = $result->fetch_assoc())
			{
				$oid = $row["brand_id"];
				$tit = $row["brand_title"];
			
				?>
			
			
			
             <tr>   
				    <td><h4><a href="User.Search.php?var5=<?php echo $oid; ?>"> #<?php echo $bid; ?> - <?php echo $tit; ?></a></h4></td>
				  
			</tr> 	 
			
				
			
	<?php
		
			}
			
		}	
			
	?>
			
			</table>
		
		</section>
			   
			   
			   
        </div>
		
		
		
		
		
		
		
		
           
 		<div class="col-sm-6">
				
		<h3>Product List </h3>  			   
			   
<section class="mbr-section mbr-section--relative" id="Cart-msg-box4-0" style="background-color: rgb(255, 255, 255);">
			
	<table border="0" width="90%"> 		
			
<?php
			
	require('db.php');
	//$cid = $_REQUEST['var'];
	
	$sql1="SELECT * FROM products Where product_brand=$sel_id " ;
	
	$result1 = $conn->query($sql1);

	
	 while($row1 = $result1->fetch_assoc())
	 {
	  	$pid1=$row1['product_id'];
	  	$img1=$row1['product_image'];
		$tit1=$row1['product_title'];
		
				
				?>
		
			
			
             <tr>   
				    <td><h4><a target="blank" href="Product.php?var=<?php echo $pid1; ?>"><?php echo $tit1; ?></a></h4></td>
				  
			</tr> 	 
			
				
			
	<?php
		
			
			
	 }	
			
	?>
			
			</table>
		
		</section>
				
				
				
  			</div>
			
                    
			<div class="mbr-header mbr-header--center mbr-header--std-padding">
                           <br>
							<!--
							<h2 class="mbr-header__text">My Orders</h2>
							<h2 class="mbr-header__text">Orders No 1 </h2>
							<h2 class="mbr-header__text">Orders No 2</h2>
							-->
            </div>
			

        </div>
    </div>
<br><br>
</section>

<!-- Footer Link ---------------------------------- -->
<?php 

include('footer.php'); 

?>



  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smooth-scroll/SmoothScroll.js"></script>
  <!--[if lte IE 9]>
    <script src="assets/jquery-placeholder/jquery.placeholder.min.js"></script>
  <![endif]-->
  <script src="assets/mobirise/js/script.js"></script>
 <!--
  <script src="assets/formoid/formoid.min.js"></script>
  -->
  
</body>
</html>