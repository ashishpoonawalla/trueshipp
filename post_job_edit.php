<?php 
try{
  // echo "<br><br>";
  session_start();
}catch(Exception $e){

}
include("header.php");
?>

<!-- Common Area Top ------------------ -->
<?php
			
		require('db.php');


        $limit = 10; 


     
        $jobid  = $_REQUEST["jobid"]; 
        $_SESSION["jidedit"] =  $jobid;
  
      

		$sql1="SELECT * FROM products Where product_id=$jobid" ;
      
		$result1 = $conn->query($sql1);

			
		if($row1 = $result1->fetch_assoc())
		{
        	$pid1 =$row1['product_id'];
			$img1 =$row1['product_image'];
            $tit1 =$row1['product_title'];
            $pri1 =$row1['product_price'];

            $PCity =$row1['PCity'];
            $DCity =$row1['DCity'];
            $Pdate = $row1['PDate'];
            $Ddate = $row1['DDate'];

            $cat1 = $row1['product_cat'];
            $key = $row1['product_keywords'];
            $wei = $row1['pweight'];
            $num = $row1['num_pack'];

            $theDate    = new DateTime($Pdate);
            $stringDate = $theDate->format('Y-M-d');
            list($year,$month,$day) = explode("-",$stringDate);

            $st2 =  $day.'-'.$month.'-'.$year;
          
            $desc =$row1['product_desc'];
            $desc1 = substr($desc,0,100);
    
        }
?>



<!-- page title -->
<section class="page-title-section overlay" style="background: url(images/backgrounds/tra1.jpg) no-repeat center center;" >
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <ul class="list-inline custom-breadcrumb">
            <li class="list-inline-item"><a class="h3 text-primary font-secondary" href="#">Edit Job</a></li>
          </ul>
          
        </div>
      </div>
    </div>
  </section>
  <!-- /page title -->
  
  <!-- contact -->
  <section class="section bg-gray">
    <div class="container">
      
      <div class="row">
        <div class="col-lg-8 mb-4 mb-lg-0">

          <?php
                
                if (isset($_SESSION["username"])){
                ?>

               


          <form action="post_job_editCode.php" method="post">
            <input type="text" value="<?php echo $tit1; ?>" class="form-control mb-3" name="title" placeholder="Your Job Title" maxlength="250" required style= "height: 40px; ">            
            <input type="text" value="<?php echo $PCity; ?>" class="form-control mb-3" name="pcity" placeholder="Pickup City" maxlength="100" required style= "height: 40px; ">
            Packege Pickup Date:
            <input type="date" value="<?php echo $Pdate; ?>" class="form-control mb-3" name="pdate" placeholder="Pickup Date" required style= "height: 40px; ">
            <input type="text" value="<?php echo $DCity; ?>" class="form-control mb-3" name="dcity" placeholder="Drop City" maxlength="100" required style= "height: 40px; ">
            Packege Delivery Date:
            <input type="date" value="<?php echo $Ddate; ?>" class="form-control mb-3" name="ddate" placeholder="Drop Date" required style= "height: 40px; ">
            
            Category:
            <select class="form-control  mb-3" name="category" required="" placeholder="" style= "height: 40px; ">
								<?php
				
								require('db.php');
								
								$sql1="SELECT * FROM categories" ;
								
								$result1 = $conn->query($sql1);

								
								 while($row1 = $result1->fetch_assoc())
								 {
								  	$id=$row1['cat_id'];
                                    $cat=$row1['cat_title'];
                                    if ($cat1 == $cat)
                                        echo "<option value='$cat' Selected>$cat</option>";									
                                    else
                                        echo "<option value='$cat'>$cat</option>";									
								 }
									
							    ?>
								
            </select>
							
            <input type="text" value="<?php echo $pri1; ?>" class="form-control mb-3" name="price" placeholder="Price of delivery" maxlength="8" required style= "height: 40px; ">
            <input type="text" value="<?php echo $key; ?>" class="form-control mb-3" name="size" placeholder="Size (length x width x height)" maxlength="30" required style= "height: 40px; ">
            <input type="text" value="<?php echo $wei; ?>" class="form-control mb-3" name="pweight" placeholder="Weight in KG" maxlength="20" required style= "height: 40px; ">
            <input type="text" value="<?php echo $num; ?>" class="form-control mb-3" name="num_pack" placeholder="Number of packages (1/2/3)" maxlength="10" required style= "height: 40px; ">
            
            <textarea name="desc" class="form-control mb-3" placeholder="Job Details" minlength="100" maxlength="1000" required style= "height: 100px; "><?php echo $desc; ?> </textarea>
            <!--
            <input type="checkbox" id="terms" name="terms" value="Terms" required>
            <label for="vehicle1"> I agree with the <a href='http://localhost/trueshipp/termsofuse.php'>Terms</a> 
            & <a href='http://localhost/trueshipp/privacy.php'>Privacy</a> of Trueshipp</label><br>
            -->
            <button type="submit" value="send" class="btn btn-primary">Update Job</button>
          </form>



          <?php   
                }else{
                 ?>

<br />
<div class="alert alert-danger" role="alert">
    Warning! you must be login to view this page..
</div>
<br/>                
<a href="ULogin.php"  >User Login</a>
<br/>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />  

                 <?php

                }
                 ?>

        </div>
        <div class="col-lg-4">
          
        </div>
      </div>
    </div>
  </section>
  <!-- /contact -->











<!-- Common Area Bottom ----------------------- -->
<!-- footer -->
<?php 
include("footer.php");
?>


</body>
</html>