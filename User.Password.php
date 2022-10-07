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

<br><br>

<!-- Change Password ---------------------------------- -->
			<div class="col-sm-3">
			</div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2" style="background-color: #aaa; " data-form-type="formoid">
                        <br>
						<div class="mbr-header mbr-header--center mbr-header--std-padding">
                            <h2 class="mbr-header__text">Change Password</h2>
                        </div>
						<?php 
						
						
						
		    if(isset($_POST['oldpass']))   
			{
				
				$oldpass = ($_POST['oldpass']);
				$new1 = ($_POST['newpass1']);								
				$new2 = ($_POST['newpass2']);
						
				
				if ($new1 != $new2)
				{
					?>
				   
				   <div data-form-alert="true">
                            <div data-form-alert-success="true">New password not match!</div><br><br><br><br><br><br><br><br><br><br>
                        </div>
				   <?php
				}
				else if (strlen($new1) < 8 || strlen($new1) > 20)
				{
					?>
				   
				   <div data-form-alert="true">
                            <div data-form-alert-success="true">Password must be 8 to 20 charcter !</div><br><br><br><br><br><br><br><br><br><br>
                        </div>
				   <?php
				}else{
					
				
				
					
				
				
						
					$uname = $_SESSION["uname"];
	        		require('db.php');
			
					$sql="SELECT * FROM user_info WHERE email='$uname' AND password='$oldpass' " ;
					$result = $conn->query($sql);

					 if($row = $result->fetch_assoc())
					 {
					  		
									
						require('db.php');
			
						$sql="UPDATE user_info SET password='$new1' WHERE email='$uname' " ;
				
						if ($conn->query($sql) === TRUE) {
					   	?>
					   
					   		<div data-form-alert="true">
	                            <div data-form-alert-success="true">Password update succesfully!</div><br><br><br><br><br><br><br><br><br><br>
	                        </div>
					   <?php
						} else {
						?>
							<div data-form-alert="true">
	                            <div data-form-alert-warning="true">Some Error updateing...!</div><br><br><br><br><br><br><br>
	                        </div>
							<?php
							
					   		 echo "Error Inserting record: " . $conn->error;
						}

					} else {
						?>
					   
					   		<div data-form-alert="true">
	                            <div data-form-alert-success="true">Invalid Username Or Passoword!</div><br><br><br><br><br><br><br><br><br><br>
	                        </div>
					   <?php
					}
							
					$conn->close();

				
				}
				
				
			}else{
						
					
						
						?>
						
                        
                        <form action="#" method="post" data-form-title="Signup Seller">
                             <div class="form-group">
                                <input type="password" class="form-control" name="oldpass" required="" placeholder="Old Password*">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="newpass1" required="" placeholder="New Password*" >
                            </div>
							 <div class="form-group">
                                <input type="password" class="form-control" name="newpass2" required="" placeholder="Retype New Password*" >
                            </div>
							
                            
							
                            <div class="mbr-buttons mbr-buttons--right"><button type="submit" class="mbr-buttons__btn btn btn-lg btn-warning">Change Password</button></div>
							<br>
                        </form>
						<br>
						<?php
						}
						?>
                    </div>
					
                </div>
            </div>
 			<div class="col-sm-3">
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