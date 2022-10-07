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
 <!-- User Details ---------------------------------- -->
            <div class="col-sm-2">
            
            </div>
 			

  
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1" style="background-color: #aaa; " data-form-type="formoid">
                        <br>
						<div class="mbr-header mbr-header--center mbr-header--std-padding">
                            <h2 class="mbr-header__text">User Details</h2>
                        </div>
						<?php 
						
						$uidd = $_SESSION["uid"];
						
						    if(isset($_POST['email']))   {

       							$email = ($_POST['email']);
        						//$pass = ($_POST['password']);
								
								$fname = ($_POST['f_name']);
								$lname = ($_POST['l_name']);
								$ph = ($_POST['phone']);
								$add = ($_POST['address']);
								$city = ($_POST['city']);
								$pin = ($_POST['pin']);
								
							require('db.php');
		        $sql ="";
				$sql="UPDATE user_info SET email='$email', first_name='$fname',last_name='$lname',mobile='$ph',address='$add',city='$city',pin='$pin' Where user_id='$uidd' " ;
			

				if ($conn->query($sql) === TRUE) {
				   ?>
				   
				   <div data-form-alert="true">
                            <div data-form-alert-success="true">Profile Updated!</div><br><br><br><br><br><br><br><br><br><br>
                        </div>
				   <?php
				} else {
					?>
					<div data-form-alert="true">
                            <div data-form-alert-warning="true">Some Error When Updating Account!</div><br><br><br><br><br><br><br>
                        </div>
						<?php
						
				    echo "Error Inserting record: " . $conn->error;
				}

						
				$conn->close();

					}else{
						
					
						
						?>
						
						
						
						<?php                         
				//session_start();		
				$uname = $_SESSION["uname"];
        		require('db.php');
		
				$sql="SELECT * FROM user_info WHERE email='$uname' " ;
				$result = $conn->query($sql);

				 if($row = $result->fetch_assoc())
				  {
				  	$email = $row["email"] ;
					$uid = $row["user_id"] ;
					$fname = $row["first_name"];
					$lname = $row["last_name"];
					$mobile = $row["mobile"];
					$address = $row["address"];
					$city = $row["city"];
					$pin = $row["pin"];
					
					
					
				  	}
						?>
                        
                        <form action="#" method="post" data-form-title="Signup Seller">
                             <div class="form-group">
                                <input type="email" class="form-control" name="email" required=""  value = "<?php echo $email; ?>" placeholder="Email/Username*">
                            </div>
                            
                            <div class="form-group">
                                <input type="text" class="form-control" name="f_name" required="" placeholder="First Name*"   value = "<?php echo $fname; ?>"data-form-field="Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="l_name" required="" placeholder="Last Name*" value = "<?php echo $lname; ?>" data-form-field="Name">
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control" name="phone" required="" placeholder="Phone*" value = "<?php echo $mobile; ?>" data-form-field="Phone">
                            </div>
							
							<div class="form-group">
                                <textarea class="form-control" name="address" rows="7" placeholder="Address*" required="" data-form-field="Message"><?php echo $address; ?></textarea>
                            </div>
							<div class="form-group">
                                <input type="text" class="form-control" name="city" required="" placeholder="City*" value = "<?php echo $city; ?>"data-form-field="Phone">
                            </div>
							
							<div class="form-group">
                                <input type="text" class="form-control" name="pin" required="" placeholder="Pin*" value = "<?php echo $pin; ?>"data-form-field="Phone">
                            </div>
							
                            <div class="mbr-buttons mbr-buttons--right"><button type="submit" class="mbr-buttons__btn btn btn-lg btn-warning">Update Details</button></div>
							<br>
                        </form>
						
						<?php
						}
						?>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
            
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