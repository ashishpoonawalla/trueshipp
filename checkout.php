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

	
//header('Location: Login.php');


?>






<section class="engine"><a rel="external" href="#">best drag and drop web page design software</a></section><section class="mbr-section mbr-section--relative mbr-section--fixed-size mbr-after-navbar" id="page6-social-buttons1-0" style="background-color: rgb(255, 255, 255);">
    

    <div class="mbr-section__container container">
        <div class="mbr-header mbr-header--inline row" style="padding-top: 13.6px; padding-bottom: 2px;">
            <div class="col-sm-4">
                <h3 class="mbr-header__text">Checkout</h3>
            </div>
            <div class="mbr-social-icons col-sm-8">
                <div class="mbr-social-likes social-likes_style-1" data-counters="false">
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
	
</section>


<section class="mbr-section mbr-section--relative" id="Cart-msg-box4-0" style="background-color: rgb(255, 255, 255);">
    
    <div class="mbr-section__container mbr-section__container--isolated container" style="padding-top: 1px; padding-bottom: 11px;">
        <div class="row">
            
		
		<table border="0" width="100%"> 
				
			<?php
			
			//session_start();
		 	$un1 = session_id();
			
			require('db.php');
			
			
			$sql="SELECT * FROM cart WHERE ip_add='$un1' " ;
			
			$result = $conn->query($sql);

			$total=0;
			while($row = $result->fetch_assoc())
			{
				$id1= $row["id"];
				$p1 = $row["p_id"];
				$q1 = $row["qty"];
				$pri1 = $row["rate"];
				
				$sql1="SELECT * FROM products Where product_id=$p1 " ;
			
				$result1 = $conn->query($sql1);

			
			 	while($row1 = $result1->fetch_assoc())
			  	{
			  		$pid1=$row1['product_id'];
			  		$img1=$row1['product_image'];
					$tit1=$row1['product_title'];
					//$pri1=$row1['product_price'];

					$amt = $q1 * $pri1;
					
				
				?>
			
			
			<div class="mbr-box mbr-box--fixed mbr-box--adapted">
              <tr>  
				
				
				<td>
				<div class="mbr-box__magnet mbr-box__magnet--top-left mbr-section__left col-sm-2">
                    <figure class="mbr-figure mbr-figure--adapted mbr-figure--caption-inside-bottom mbr-figure--full-width"><img src="assets/images/<?php echo $img1; ?>" style="width:150px;" class="mbr-figure__img"></figure>
                </div>
				</td>

                    <div class="mbr-section__container mbr-section__container--middle">
                        <div class="mbr-header mbr-header--auto-align mbr-header--wysiwyg">
                           <td><h3 class="mbr-header__text"><?php echo $tit1; ?></h3></td>
						   <td><h3 class="mbr-header__text">Rs.<?php echo $pri1; ?></h3></td>
						   <td><h3 class="mbr-header__text">-<?php echo $q1; ?>-</h3></td>
						   <td><h3 class="mbr-header__text"><?php echo $amt; ?></h3></td>
                        	
                    	</div>
					 </div>
					
               
				
				
				
                <td>       
                        	<div class="mbr-buttons mbr-buttons--auto-align btn-inverse"><a class="mbr-buttons__btn btn btn-lg btn-primary" href="checkoutDel.php?var=<?php echo $id1; ?>"> X </a></div>
				</td>
                
               </tr>
            </div>
			
		
			
			<?php
				}
				$total += $amt;
				
			}
			
			?>
			
		</table>	
        </div>
    </div>
	<br>
</section>




<section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="checkout-form1-0" style="background-color: rgb(204, 204, 204);">
    
    <div class="mbr-section__container mbr-section__container--std-padding container" style="padding-top: 93px; padding-bottom: 93px;">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    
					<div class="col-sm-6 col-sm-offset-0" data-form-type="formoid">
					 <div class="mbr-section__container">
                        <div class="mbr-header mbr-header--auto-align mbr-header--wysiwyg">
						<form method="post" action="checkoutCode.php" data-form-title="Seller Login">
                        
                            <h3 class="mbr-header__text">Total Rs. <?php echo $total; ?></h3><br><br><br>	
							<h3 class="mbr-header__text">
							Payment Mode                        
								<br><br>
								<input type="hidden" name="total" value="<?php echo $total; ?>" >
								<div class="form-group">
									<input type="radio" style ="width: 1em; height: 1em;" name="payment" value="COD" checked> <img src="img/cash-on-delivery.png" style="width: 150px; " alt="COD - Cash On Delivery">
								</div>
								
								<div class="form-group">
  									<input type="radio" style ="width: 1em; height: 1em;" name="payment" value="Paypal" > <img src="img/paypal.png" style="width: 150px; " alt="Paypal">
								</div>
								<br>
								<div class="form-group">
  									<input type="radio" style ="width: 1em; height: 1em;" name="payment" value="CCAvenue" > <img src="img/ccavenue1.png" style="width: 150px; " alt="CCAvenue">
								</div>
								
							</h3>
							<br>
						<div class="mbr-buttons mbr-buttons--left"><button type="submit" class="mbr-buttons__btn btn btn-lg btn-success">Book Your Order</button></div>
						</form>	
							
                        </div>
                    </div>
					</div>
					
					<div class="col-sm-6 col-sm-offset-0" data-form-type="formoid">
                        <div class="mbr-header mbr-header--center mbr-header--std-padding">
                            <h2 class="mbr-header__text">Delivery Address</h2>
                        </div>
<?php                         
				//session_start();		
				$uname = $_SESSION["uname"];
        		require('db.php');
		
				$sql="SELECT * FROM user_info WHERE email='$uname' " ;
				$result = $conn->query($sql);

				 if($row = $result->fetch_assoc())
				  {
				  	
					$uid = $row["user_id"] ;
					$fname = $row["first_name"];
					$lname = $row["last_name"];
					$mobile = $row["mobile"];
					$address = $row["address"];
					$city = $row["city"];
					$pin = $row["pin"];
					
					
					
				  	}
?>					
                            
                            <div class="form-group">
                                <input type="text" class="form-control" name="f_name" required="" placeholder="First Name*" value = "<?php echo $fname; ?>" data-form-field="Name" disabled>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="l_name" required="" placeholder="Last Name*"  value = "<?php echo $lname; ?>"  data-form-field="Name" disabled>
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control" name="phone" required="" placeholder="Phone*" value = "<?php echo $mobile; ?>" data-form-field="Phone" disabled>
                            </div>
							
							<div class="form-group">
                                <textarea class="form-control" name="address" rows="7" placeholder="Address*" required="" data-form-field="Message" disabled><?php echo $address; ?></textarea>
                            </div>
							<div class="form-group">
                                <input type="text" class="form-control" name="city" required="" placeholder="City*" value = "<?php echo $city; ?>"data-form-field="Phone" disabled>
                            </div>
							
							<div class="form-group">
                                <input type="text" class="form-control" name="pin" required="" placeholder="Pin*" value = "<?php echo $pin; ?>"data-form-field="Phone" disabled>
                            </div>
							
                            <div class="mbr-buttons mbr-buttons--right"><a href="Login1.php"><button type="submit" class="mbr-buttons__btn btn btn-lg btn-Default">Change Delivery Details</button></a></div>
							<br>
                       
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
  <script src="assets/social-likes/social-likes.js"></script>
  <!--[if lte IE 9]>
    <script src="assets/jquery-placeholder/jquery.placeholder.min.js"></script>
  <![endif]-->
  <script src="assets/mobirise/js/script.js"></script>
 <!-- <script src="assets/formoid/formoid.min.js"></script> -->
  
  
</body>
</html>