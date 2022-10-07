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



<section class="engine"><a rel="external" href="#">free bootstrap web page maker software download</a></section><section class="mbr-section mbr-section--relative mbr-section--fixed-size mbr-after-navbar" id="page5-form1-0" style="background-color: rgb(239, 239, 239);">
    
    <div class="mbr-section__container mbr-section__container--std-padding container" style="padding-top: 93px; padding-bottom: 93px;">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2" style="background-color: #aaa; " data-form-type="formoid">
                        <br>
						<div class="mbr-header mbr-header--center mbr-header--std-padding">
                            <h2 class="mbr-header__text">Signup New User</h2>
                        </div>
						<?php 
						
						
						
						    if(isset($_POST['email']))   {

       							$email = ($_POST['email']);
        						$pass = ($_POST['password']);
								
								$fname = ($_POST['f_name']);
								$lname = ($_POST['l_name']);
								$ph = ($_POST['phone']);
								$add = ($_POST['address']);
								$city = ($_POST['city']);
								$pin = ($_POST['pin']);
								
							require('db.php');
		
				$sql="INSERT INTO user_info(email, password, first_name,last_name,mobile,address,city,pin) Values('$email','$pass','$fname','$lname','$ph','$add','$city','$pin') " ;
			//$sql="INSERT INTO seller_info('username', 'password', 'store_name' ) Values('$email','$pass','$snm')" ;

				if ($conn->query($sql) === TRUE) {
				   ?>
				   
				   <div data-form-alert="true">
                            <div data-form-alert-success="true">Thanks for signing with us!</div><br><br><br><br><br><br><br><br><br><br>
                        </div>
				   <?php
				} else {
					?>
					<div data-form-alert="true">
                            <div data-form-alert-warning="true">Some Error when creating account!</div><br><br><br><br><br><br><br>
                        </div>
						<?php
						
				    echo "Error Inserting record: " . $conn->error;
				}

						
				$conn->close();

					}else{
						
					
						
						?>
						
                        
                        <form action="#" method="post" data-form-title="Signup Seller">
                             <div class="form-group">
                                <input type="email" class="form-control" name="email" required="" placeholder="Email/Username*">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" required="" placeholder="Password*" >
                            </div>
							
                            <div class="form-group">
                                <input type="text" class="form-control" name="f_name" required="" placeholder="First Name*" data-form-field="Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="l_name" required="" placeholder="Last Name*" data-form-field="Name">
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control" name="phone" required="" placeholder="Phone*" data-form-field="Phone">
                            </div>
							
							<div class="form-group">
                                <textarea class="form-control" name="address" rows="7" placeholder="Address*" required="" data-form-field="Message"></textarea>
                            </div>
							<div class="form-group">
                                <input type="text" class="form-control" name="city" required="" placeholder="City*" data-form-field="Phone">
                            </div>
							
							<div class="form-group">
                                <input type="text" class="form-control" name="pin" required="" placeholder="Pin*" data-form-field="Phone">
                            </div>
							
                            <div class="mbr-buttons mbr-buttons--right"><button type="submit" class="mbr-buttons__btn btn btn-lg btn-warning">SIGNUP</button></div>
							<br>
                        </form>
						
						<?php
						}
						?>
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
  <!--[if lte IE 9]>
    <script src="assets/jquery-placeholder/jquery.placeholder.min.js"></script>
  <![endif]-->
  <script src="assets/mobirise/js/script.js"></script>
 <!--
  <script src="assets/formoid/formoid.min.js"></script>
  -->
  
</body>
</html>