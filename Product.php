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

<br>




<!--
<section class="engine"><a rel="external" href="#">top responsive web page design software</a></section><section class="mbr-section mbr-section--relative mbr-section--fixed-size mbr-after-navbar" id="page1-social-buttons1-0" style="background-color: rgb(255, 255, 255);">
    

    <div class="mbr-section__container container">
        <div class="mbr-header mbr-header--inline row" style="padding-top: 3.6px; padding-bottom: 3.2px;">
            <div class="col-sm-4">
                <h3 class="mbr-header__text">Product Details</h3>
            </div>
            <div class="mbr-social-icons col-sm-8">
                <div class="mbr-social-likes social-likes_style-1" data-counters="false">
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
</section>
-->

<section class="mbr-section mbr-section--relative" id="Product-msg-box4-0" style="background-color: rgb(255, 255, 255);">
   
	<?php
			$pid=$_REQUEST['var'];
			
			require('db.php');
			
				
			$sql="SELECT * FROM products where product_id=$pid" ;
			
			$result = $conn->query($sql);

			
			if($row = $result->fetch_assoc())
			  {
			  	$pid1=$row['product_id'];
			  	$img1=$row['product_image'];
				$tit1=$row['product_title'];
				$pri1=$row['product_price'];
				
				$details=$row['product_desc'];
				$category=$row['product_cat'];
				$brand=$row['product_brand'];
				$img2=$row['img2'];
				$img3=$row['img3'];
				$img4=$row['img4'];
				$wei=$row['weight'];
				$com=$row['compatible'];
				
				
				
			  	?>
			  	
				
				
<br>				
<div class="mbr-section__container mbr-section__container--isolated container" style="padding-top: 93px; padding-bottom: 93px;">
        <div class="row">
            <div class="mbr-box mbr-box--fixed mbr-box--adapted">
                <div class="mbr-box__magnet mbr-box__magnet--top-right mbr-section__left col-sm-6">
                    <figure class="mbr-figure mbr-figure--adapted mbr-figure--caption-inside-bottom mbr-figure--full-width"><img src="assets/images/<?php echo $img1; ?>" class="mbr-figure__img"></figure>
					<br><br><br><br><br>
					<table border="0" bordercolor="silver"  width="100%">
						<tr>
							<td><img width="150px" src="assets/images/<?php echo $img2; ?>" class="mbr-figure__img"></td>
							<td><img width="150px" src="assets/images/<?php echo $img3; ?>" class="mbr-figure__img"></td>
							<td><img width="150px" src="assets/images/<?php echo $img4; ?>" class="mbr-figure__img"></td>
						</tr>
					</table>
                </div>
				
                <div class="mbr-box__magnet mbr-class-mbr-box__magnet--center-left col-sm-6 mbr-section__right">
                    <div class="mbr-section__container mbr-section__container--middle">
                        <div class="mbr-header mbr-header--auto-align mbr-header--wysiwyg">
						
							<h3 class="mbr-header__text"><?php echo $tit1; ?></h3></br>
                           <!-- <h3 class="mbr-header__text">Rs. <?php echo $pri1; ?></h3> -->
                            
                      
					
					<div class="mbr-section__container">
					
					<form action="ProductAddCart.php" method="POST">
                       		<div class="form-group">
                            <select style="background-color: #eee; font-size: 18px;" class="form-control" name="psid" required="" placeholder="Full Name*">
								<?php
								$psid="";
								$un="";
								require('db.php');								
								$sql3="SELECT * FROM product_seller Where product_id=$pid1 ORDER BY rate  " ;								
								$result3 = $conn->query($sql3);
								$fl =0;
								 while($row3 = $result3->fetch_assoc())
								 {
								  	$psid=$row3['psid'];
									$un=$row3['username'];
									$rt=$row3['rate'];
									$st=$row3['instock'];
									$sn = "-";
									
										require('db.php');
										$sql4="SELECT * FROM seller_info Where username='$un'  " ;								
										$result4 = $conn->query($sql4);
										if ($row4 = $result4->fetch_assoc())
									 	{
									  		$sn=$row4['store_name'];
											$ct=$row4['city'];
										
										}
									
									
									
									if ($st >= 1)
									{
										echo "<option value='$psid' >Rs.$rt - $sn, $ct - Stock($st)</option>";		
										$fl=1;
									}
																
								 }
								
								if ($fl<=0)
								echo "<option value='#'>No Supplier</option>";
							    ?>
								
                            </select>							
							</div>
							<?php
							
					   if ($fl ==1){
					   	
					   ?>
					   		
							<input type="hidden" name="pid" value="<?php echo $pid1; ?>"/>
					    	<div class="mbr-buttons mbr-buttons--auto-align btn-inverse">
							<!-- <a class="mbr-buttons__btn btn btn-lg btn-primary" href="ProductAddCart.php?var=<?php echo $pid1; ?>&psid=<?php echo $psid; ?>&un=<?php echo $un; ?>">Add To Cart</a> -->
							<input class="mbr-buttons__btn btn btn-lg btn-primary" type="submit" value="Add To Cart" />
							</div>
                    	<?php
						}
						?>
						
						</form>
					
					</div>
					<br><br>
                    <div class="mbr-section__container mbr-section__container--middle">
                        <div class="mbr-article mbr-article--auto-align mbr-article--wysiwyg"><p><?php echo $details; ?></p></div>
                    </div>
                    
					<br><br>
					<div class="mbr-section__container mbr-section__container--middle">
                        <div class="mbr-article mbr-article--auto-align mbr-article--wysiwyg"><p>Compatible:<br> <?php echo $com; ?></p></div>
                    </div>
					
					  </div>
                    </div>
                </div>
                
            </div>
        </div>
</div>
				
				
				
				
				<?php
				
				}
				
				$conn->close();

			
				?>

		
			
			
	
	
   




</section>

<!-- Footer Link ---------------------------------- -->
<?php 

include('footer.php'); 

?>

  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smooth-scroll/SmoothScroll.js"></script>
  <script src="assets/social-likes/social-likes.js"></script>
  <script src="assets/mobirise/js/script.js"></script>
  
  
</body>
</html>