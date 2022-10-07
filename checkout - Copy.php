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

<br><br><br><br>




<section class="engine"><a rel="external" href="#">best drag and drop web page design software</a></section><section class="mbr-section mbr-section--relative mbr-section--fixed-size mbr-after-navbar" id="page6-social-buttons1-0" style="background-color: rgb(255, 255, 255);">
    

    <div class="mbr-section__container container">
        <div class="mbr-header mbr-header--inline row" style="padding-top: 13.6px; padding-bottom: 27.2px;">
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
    
    <div class="mbr-section__container mbr-section__container--isolated container" style="padding-top: 31px; padding-bottom: 31px;">
        <div class="row">
            
			
			
				
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
			
				$sql1="SELECT * FROM products Where product_id=$p1 " ;
			
				$result1 = $conn->query($sql1);

			
			 	while($row1 = $result1->fetch_assoc())
			  	{
			  		$pid1=$row1['product_id'];
			  		$img1=$row1['product_image'];
					$tit1=$row1['product_title'];
					$pri1=$row1['product_price'];

					$amt = $q1 * $pri1;
					
				
				?>
			
			
			<div class="mbr-box mbr-box--fixed mbr-box--adapted">
                
				
				
				
				<div class="mbr-box__magnet mbr-box__magnet--top-left mbr-section__left col-sm-2">
                    <figure class="mbr-figure mbr-figure--adapted mbr-figure--caption-inside-bottom mbr-figure--full-width"><img src="assets/images/<?php echo $img1; ?>" style="width:150px;" class="mbr-figure__img"></figure>
                </div>


                <div class="mbr-box__magnet mbr-class-mbr-box__magnet--center-left col-sm-9 mbr-section__right">
                   
				    <div class="mbr-section__container mbr-section__container--middle">
                        <div class="mbr-header mbr-header--auto-align mbr-header--wysiwyg">
                            <h3 class="mbr-header__text"><p><?php echo $tit1; ?> - Rs.<?php echo $pri1; ?> - <input name="qt" size="5" maxlength="5" id="avaliable_positions" style="width:60px; " type="number" value="<?php echo $q1; ?>"> - <?php echo $amt; ?> </p></h3>
                        	
                    	</div>
					 </div>
					
                </div>
				<div class="mbr-box__magnet mbr-class-mbr-box__magnet--center-left col-sm-1 mbr-section__right">
                
				
				 <div class="mbr-section__container mbr-section__container--middle">
                        <div class="mbr-header mbr-header--auto-align mbr-header--wysiwyg">
                       
                        	<div class="mbr-buttons mbr-buttons--auto-align btn-inverse"><a class="mbr-buttons__btn btn btn-lg btn-primary" href="checkoutDel.php?var=<?php echo $id1; ?>"> X </a></div>
                    	</div>
					 </div>
				</div>
                
            </div>
			
			
			
			<?php
				}
				$total += $amt;
				
			}
			
			?>
			
			
        </div>
    </div>
</section>

<section class="mbr-section mbr-section--relative mbr-section--short-paddings" id="Cart-msg-box2-0" style="background-color: rgb(239, 239, 239);">

    

    <div class="mbr-section__container mbr-section__container--isolated container" style="padding-top: 60px; padding-bottom: 60px;">
        <div class="row">
            <div class="mbr-box mbr-box--fixed mbr-box--adapted">
                <div class="mbr-box__magnet mbr-box__magnet--top-left mbr-section__left col-sm-8">
                    <div class="mbr-section__container">
                        <div class="mbr-header mbr-header--auto-align mbr-header--wysiwyg">
                            <h3 class="mbr-header__text">Payment Mode                        
								<br><br><input type="radio" name="gender" value="COD"> COD<br>
  								<input type="radio" name="gender" value="CARD"> Debit/Credit Card<br>
  								<input type="radio" name="gender" value="Paypal"> Paypal
							</h3>
                        </div>
                    </div>
                    
                </div>
                <div class="mbr-box__magnet mbr-box__magnet--top-left mbr-section__right col-sm-4">
                    <div class="mbr-section__container">
                         <h3 class="mbr-header__text">Total Rs. <?php echo $total; ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


<section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="checkout-form1-0" style="background-color: rgb(204, 204, 204);">
    
    <div class="mbr-section__container mbr-section__container--std-padding container" style="padding-top: 93px; padding-bottom: 93px;">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    
					
					<div class="col-sm-6 col-sm-offset-0" data-form-type="formoid">
                        <div class="mbr-header mbr-header--center mbr-header--std-padding">
                            <h2 class="mbr-header__text">Not Registered!</h2>
                        </div>
                        <div data-form-alert="true">
                            <div class="hide" data-form-alert-success="true">Thanks for booking order!</div>
                        </div>
                        <form action="#/" method="post" data-form-title="Delivery Address">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" required="" placeholder="Name*" data-form-field="Name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" required="" placeholder="Email/Username*" data-form-field="Email">
                            </div>
							<div class="form-group">
                                <input type="password" class="form-control" name="password" required="" placeholder="Password*" data-form-field="Email">
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control" name="phone" placeholder="Phone" data-form-field="Phone">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="7" placeholder="Address" data-form-field="Message"></textarea>
                            </div>
                            <div class="mbr-buttons mbr-buttons--right"><button type="submit" class="mbr-buttons__btn btn btn-lg btn-danger">Book Order</button></div>
                        </form>
                    </div>
					
					<div class="col-sm-5 col-sm-offset-1" data-form-type="formoid">
                        <div class="mbr-header mbr-header--center mbr-header--std-padding">
                            <h2 class="mbr-header__text">Already Have Account!</h2>
                        </div>
                        <div data-form-alert="true">
                            <div class="hide" data-form-alert-success="true">Thanks for booking order!</div>
                        </div>
                        <form action="#/" method="post" data-form-title="Delivery Address">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" required="" placeholder="Email*" data-form-field="Email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password*" data-form-field="Phone">
                            </div>
                           
                            <div class="mbr-buttons mbr-buttons--right"><button type="submit" class="mbr-buttons__btn btn btn-lg btn-danger">Login & Book Order</button></div>
                        </form>
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
  <script src="assets/formoid/formoid.min.js"></script>
  
  
</body>
</html>