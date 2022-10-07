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



<section class="engine"><a rel="external" href="#">best wysiwyg web site creator software</a></section><section class="mbr-section mbr-section--relative mbr-section--fixed-size mbr-after-navbar" id="page2-social-buttons1-0" style="background-color: rgb(255, 255, 255);">
    

    <div class="mbr-section__container container">
        <div class="mbr-header mbr-header--inline row" style="padding-top: 13.6px; padding-bottom: 27.2px;">
            <div class="col-sm-4">
                <h3 class="mbr-header__text">Cart</h3>
            </div>
            <div class="mbr-social-icons col-sm-8">
                <div class="mbr-social-likes social-likes_style-1" data-counters="false">
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
</section>




 <?php 
						
						
		    if(isset($_POST['id3']))   {

				$id3 = ($_POST['id3']);
				$qt3 = ($_POST['qt']);
				
				//echo "$id3 - $qt3";
				require('db.php');
				if ($qt3 > 0 && $qt3 < 1000)
				{
					
			
					$sql="Update cart SET qty=$qt3 WHERE id=$id3 ";

					if ($conn->query($sql) === TRUE) {
				   
					}
				}
				   	$conn->close();	
					

			}
						
?>



<section class="mbr-section mbr-section--relative" id="Cart-msg-box4-0" style="background-color: rgb(255, 255, 255);">
    
    <div class="mbr-section__container mbr-section__container--isolated container" style="padding-top: 31px; padding-bottom: 31px;">
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
				$id = $row["id"];
				$p1 = $row["p_id"];
				$q1 = $row["qty"];
				$pri1 = $row["rate"];
				
				$sql1="SELECT * FROM products Where product_id=$p1 " ;
			
				$result1 = $conn->query($sql1);


			 	if($row1 = $result1->fetch_assoc())
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
				<div class="mbr-box__magnet mbr-box__magnet--top-left mbr-section__left col-sm-1">
                    <figure class="mbr-figure mbr-figure--adapted mbr-figure--caption-inside-bottom mbr-figure--full-width"><img src="assets/images/<?php echo $img1; ?>" style="width:150px;" class="mbr-figure__img"></figure>
                </div>
				</td>

                <div class="mbr-box__magnet mbr-class-mbr-box__magnet--center-left col-sm-9 mbr-section__right">
                 
				    
                         <td><h3><?php echo $tit1; ?></h3></td>
						 <td><h3>Rs.<?php echo $pri1; ?></h3></td>
						 <td><form method="post" data-form-title="Seller Login">
							   <input type="hidden" name="id3" value="<?php echo $id; ?>" >
							   <h3><input name="qt" size="3" maxlength="3" id="avaliable_positions" style="width:60px; " type="number" value="<?php echo $q1; ?>">
							   
							   <input type="image" src="assets/images/up1.png" width="24px" alt="Submit"> </h3>
							  
							</form></td>
							<td><h3><?php echo $amt; ?></h3></td>
                        	
                    	
					
                </div>
				<div class="mbr-box__magnet mbr-class-mbr-box__magnet--center-left col-sm-1 mbr-section__right">
                
					<td>
					
	                       
	                    <a class="mbr-buttons__btn btn btn-lg btn-primary" href="cartDel.php?var=<?php echo $id; ?>"> X </a>
					</td>
				</div>
                    
				</tr> 	 
			</div>
				
				
				
              
            
			
			
			
			<?php
				}
				$total += $amt;
				
			}
			if ($total <= 0 ){
				
				echo "<h3>-- No item in cart..</h3><br><br><br><br><br><br><br><br><br><br>";
			}
			?>
			
			</table>
			</div>
        </div>
    
</section>

<?php

if ($total > 0 ){
	?>
<section class="mbr-section mbr-section--relative mbr-section--short-paddings" id="Cart-msg-box2-0" style="background-color: rgb(239, 239, 239);">

    

    <div class="mbr-section__container mbr-section__container--isolated container" style="padding-top: 60px; padding-bottom: 60px;">
        <div class="row">
            <div class="mbr-box mbr-box--fixed mbr-box--adapted">
                <div class="mbr-box__magnet mbr-box__magnet--top-left mbr-section__left col-sm-8">
                    <div class="mbr-section__container">
                        <div class="mbr-header mbr-header--auto-align mbr-header--wysiwyg">
                            <h3 class="mbr-header__text">Total Rs. <?php echo $total; ?></h3>
                        </div>
                    </div>
                    
                </div>
                <div class="mbr-box__magnet mbr-box__magnet--top-left mbr-section__right col-sm-4">
                    <div class="mbr-section__container">
                        <div class="mbr-buttons mbr-buttons--auto-align mbr-buttons--top mbr-buttons--left"><a class="mbr-buttons__btn btn btn-lg btn-default" href="checkLogin.php">CHECKOUT</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


<?php
}
?>


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