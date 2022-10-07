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
        <div class="mbr-header mbr-header--inline row" style="padding-top: 13.6px; padding-bottom: 27.2px;">
            <div class="col-sm-4">
                <h3 class="mbr-header__text">Booking Order....</h3>
            </div>
            <div class="mbr-social-icons col-sm-8">
                <div class="mbr-social-likes social-likes_style-1" data-counters="false">
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
	
</section>


<section class="mbr-section mbr-section--relative" id="Cart-msg-box4-0" style="background-color: rgb(255, 255, 255);">
    
    <div class="mbr-section__container mbr-section__container--isolated container" style="padding-top: 21px; padding-bottom: 11px;">
        <div class="row">
            		
			
				
			<?php
			
			//session_start();
		 	$un1 = session_id();
			
			require('db.php');
			$uid = $_SESSION["uid"];
			$tot = $_POST["total"];
			$pay = $_POST["payment"];
		    $sql = "";
			$sql="INSERT INTO orders(user_id, payment_mod, total) Values('$uid', '$pay', $tot) " ;
			
			if ($conn->query($sql) === TRUE) {
					
					$last_id = $conn->insert_id;
					//session_start();
					$_SESSION["oid"] = $last_id ;
				    //echo "Order ID: ".$_SESSION["oid"];
					
			}	

			
			require('db.php');			
			$sql="SELECT * FROM cart WHERE ip_add='$un1' " ;			
			$result = $conn->query($sql);

			$total=0;
			$oid = $_SESSION["oid"];
			while($row = $result->fetch_assoc())
			{
				$id1= $row["id"];
				$p1 = $row["p_id"];
				$q1 = $row["qty"];
				$rt1 = $row["rate"];
				$unm = $row["username"];
				$psid = $row["psid"];
				
				
				
				
			    $oid = $_SESSION["oid"];
			
				{
				
			
					require('db.php');	
					$sql = "";				
					$sql="INSERT INTO orders_detail(order_id, p_id, qty, rate, username, psid) Values('$oid', '$p1', $q1, $rt1, '$unm', $psid) " ;			
					$conn->query($sql);
					
					
				}	
				/*
				$sql1="SELECT * FROM products Where product_id=$p1 " ;
			
				$result1 = $conn->query($sql1);

			
			 	while($row1 = $result1->fetch_assoc())
			  	{
			  		$pid1=$row1['product_id'];
			  		$img1=$row1['product_image'];
					$tit1=$row1['product_title'];
					$pri1=$row1['product_price'];

					$amt = $q1 * $pri1;
				}	
				*/
				}
				require('db.php');
				$sql = "";
				
				$sql="DELETE FROM cart WHERE ip_add='$un1' " ;
			
				$conn->query($sql);
				
				?>
				
			<div class="mbr-box mbr-box--fixed mbr-box--adapted">
                
				
                <div class="mbr-box__magnet mbr-class-mbr-box__magnet--center-left col-sm-9 mbr-section__right">
                   
				    <div class="mbr-section__container mbr-section__container--middle">
                        <div class="mbr-header mbr-header--auto-align mbr-header--wysiwyg">
                            <h3 class="mbr-header__text"><p>Order Booking Done. <br><br> Order ID <?php echo $oid; ?></p></h3>
                        	
                    	</div>
					 </div>
					
                </div>
				
                
            </div>
				
				<?php
				
				
				
				if ($pay == "Paypal")
				{
					
					//---------------------------------------------------------------- Paypal Button ------------------

					define('PAYPAL_ID', 'ashish.omar.pune@gmail.com'); 
					define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE 
					 
					define('PAYPAL_CANCEL_URL', 'http://localhost/trueshipp/paypal-deposit-cancel.php'); 
					define('PAYPAL_NOTIFY_URL', 'http://localhost/trueshipp/paypal-deposit-ipn.php'); 
					define('PAYPAL_CURRENCY', 'INR'); 

					// Change not required 
					define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");
    ?>

<!--  ---------------------------------------------------------Display the payment button  -->
        <div class="pro-box">
            
            <div class="body">
                <h5>Paypay Payment - <?php echo $tot; ?></h5>
				
                <form action="<?php echo PAYPAL_URL; ?>" method="post">
                    <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">			
                    <input type="hidden" name="cmd" value="_xclick">					
                    <input type="hidden" name="item_name" value="Order">
                    <input type="hidden" name="item_number" value="Pay <?php echo $tot; ?>">
                    <input type="hidden" name="amount" value="<?php echo $tot; ?>">
                    <input type="hidden" name="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>">		
        <input type="hidden" name="return" value="http://localhost/trueshipp/paypal-deposit-success.php?var1=<?php echo $oid; ?>">
                    <input type="hidden" name="cancel_return" value="<?php echo PAYPAL_CANCEL_URL; ?>">
                    <input type="image" name="submit" border="0" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif">
                </form>
            </div>
        </div>
<hr>

				<?php	
				} 
				else if ($pay == "CCAvenue")
				{
				
				require_once "ccavenue/config.php";
				
				$uname = $_SESSION["uname"];
        		require('db.php');
		
				$sql="SELECT * FROM user_info WHERE email='$uname' " ;
				$result = $conn->query($sql);

				 if($row = $result->fetch_assoc())
				  {
				  	
					$uid = $row["user_id"] ;
					$fname = $row["first_name"]. " ". $row["last_name"];
					$mobile = $row["mobile"];
					$address = $row["address"];
					$city = $row["city"];
					$pin = $row["pin"];
					$email = $row["email"];
					
				
				
				?>
				
				<form name="frmPayment" action="ccavenue/ccavRequestHandler.php" method="POST">
				    <input type="hidden" name="merchant_id" value="<?php echo CCA_MERCHANT_ID; ?>"> 
				    <input type="hidden" name="language" value="EN"> 
				    <input type="hidden" name="amount" value="1">
				    <input type="hidden" name="currency" value="INR"> 
				    <input type="hidden" name="redirect_url" value="http://youdomain.com/payment-response.php"> 
				    <input type="hidden" name="cancel_url" value="http://youdomain.com/payment-cancel.php"> 
				    
				    <div>
				    <input type="hidden" name="billing_name" value="<?php echo $fname; ?>" class="form-field" Placeholder="Billing Name"> 
				    <input type="hidden" name="billing_address" value="<?php echo $address; ?>" class="form-field" Placeholder="Billing Address">
				    </div>
				    <div>
				    <input type="hidden" name="billing_state" value="" class="form-field" Placeholder="State"> 
				    <input type="hidden" name="billing_zip" value="<?php echo $pin; ?>" class="form-field" Placeholder="Zipcode">
				    </div>
				    <div>
				    <input type="hidden" name="billing_country" value="" class="form-field" Placeholder="Country">
				    <input type="hidden" name="billing_tel" value="<?php echo $mobile; ?>" class="form-field" Placeholder="Phone">
				    </div> 
				    <div>
				    <input type="hidden" name="billing_email" value="<?php echo $email; ?>" class="form-field" Placeholder="Email">
				    </div>
				    <div>
				    <button class="btn-payment" type="submit">Pay Now On CCAvenue</button>
				    </div>
				</form>
				
				
				
				<?php
					}
				}
				?>
			
			
			
			
        </div>
    </div>
	<br>
</section>


<br><br><br><br><br><br><br><br><br>

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