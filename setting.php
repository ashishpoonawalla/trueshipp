<?php 
try{
  // echo "<br><br>";
  session_start();
}catch(Exception $e){

}
include("header.php");

?>

<!-- page title -->
<section class="page-title-section overlay" style="background: url(images/backgrounds/tra1.jpg) no-repeat center center;" >
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <ul class="list-inline custom-breadcrumb">
            <li class="list-inline-item"><a class="h3 text-primary font-secondary" href="#">Profile Settings</a></li>
            <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
          </ul>
          
        </div>
      </div>
    </div>
  </section>
  <!-- /page title -->

<?php

if(!isset( $_SESSION["username"])  ){
  include('warnings.php');
}else{


//echo " - ". $_SESSION["username"];

  





$uname = $_SESSION["username"] ;

		
								
				require('db.php');
		
				$sql="SELECT * FROM user_info WHERE email='$uname' " ;
				$result = $conn->query($sql);

				 if($row = $result->fetch_assoc())
				  {
				  					

					
					$fnm =  $row["first_name"];
					$mob =  $row["mobile"];
					$uid = $row["user_id"];
					$add = $row["address"];
          $cit = $row["city"];
          $pin = $row["pin"];
          
          $sta = $row["status1"];
          $Details = $row["Details"];

        
				
				
				} 


?>
<!-- Common Area Top ------------------ -->








  
  <!-- contact -->
  <section class="section bg-gray">
    <div class="container">
      
      <div class="row">
        <div class="col-lg-8 mb-4 mb-lg-0">
          <form action="settingCode.php" method="POST">
            <p>Email: <?php echo $uname; ?></p>
            <input type="text" value="<?php echo $fnm; ?>" class="form-control mb-3" id="fname" name="fname" placeholder="Full Name" required>
            <input type="text" value="<?php echo $mob; ?>" class="form-control mb-3" id="mobile" name="mobile" placeholder="Mobile No" required>            
            <input type="text" value="<?php echo $add; ?>" class="form-control mb-3" id="address" name="address" placeholder="Address" required>            
            <input type="text" value="<?php echo $cit; ?>" class="form-control mb-3" id="city" name="city" placeholder="City" required>            
            <input type="text" value="<?php echo $pin; ?>" class="form-control mb-3" id="pin" name="pin" placeholder="Pin" required>            
            <textarea name="desc" id="desc" class="form-control mb-3" placeholder="Profile Desciptions"><?php echo $Details; ?></textarea>
            <button type="submit" value="send" class="btn btn-primary">Save Information</button>
          </form>
        </div>
        <div class="col-lg-1">
        </div>
        <div class="col-lg-3">

<!--                Profile Image ------------------------------- -->
<p class="mb-5">

<!-- Profile Image Modal -->

<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#profileModal">Change Image</a>
<img src="./assets/imagesu/<?php echo $uname; ?>.jpg?t=<?php echo filemtime('./assets/imagesu/'.$uname.'.jpg'); ?>" style="height: 200px; width: 200px; object-fit: cover;">

<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-5 border-0 p-4">
            <div class="modal-header border-0">
                <h3>Profile Image</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
            <form action="setting11.php?img_num="  method="post" enctype="multipart/form-data">

								    <div class="form-group">
								      
								      <input type="file" onchange="this.form.submit()" class="form-control" name="fileToUpload" id="fileToUpload"  onkeypress="unsetnameError(false);" >
								    </div>

								    <!-- <button type="submit" class="btn btn-primary">Upload Image</button> -->
								 
								     <br />						    
						     </form>  
            </div>
        </div>
    </div>
</div>

</p>



<!--                ID Proof 1 Image ------------------------------- -->
<p class="mb-5">

<!-- ID Proof 1 Image -->


<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#id1Modal">Driving Licence</a>
<!-- <img src="./assets/imagesu/<?php echo $uname; ?>ID1.png" class="img-fluid w-100" >
-->
<img src="./assets/imagesu/<?php echo $uname; ?>ID1.png?t=<?php echo filemtime('./assets/imagesu/'.$uname.'ID1.png'); ?>"  style="width: 200px;">


<div class="modal fade" id="id1Modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-5 border-0 p-4">
            <div class="modal-header border-0">
                <h3>ID Proof 1</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
            <form action="setting22.php"  method="post" enctype="multipart/form-data">

								    <div class="form-group">
								      
								      <input type="file" onchange="this.form.submit()" class="form-control" name="fileToUpload" id="fileToUpload"  onkeypress="unsetnameError(false);" >
								    </div>

								    <!-- <button type="submit" class="btn btn-primary">Upload Image</button> -->
								 
								     <br />						    
						     </form>  
            </div>
        </div>
    </div>
</div>
</p>

<!--                ID Proof 2 Image ------------------------------- -->
<p class="mb-5">

<!-- ID Proof 2 Image -->


<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#id2Modal">Identification Card</a>
<!-- <img src="./assets/imagesu/<?php echo $uname; ?>ID2.png" class="img-fluid w-100" >
-->
<img src="./assets/imagesu/<?php echo $uname; ?>ID2.png?t=<?php echo filemtime('./assets/imagesu/'.$uname.'ID2.png'); ?>"  style="width: 200px; ">

<div class="modal fade" id="id2Modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-5 border-0 p-4">
            <div class="modal-header border-0">
                <h3>ID Proof 2</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
            <form action="setting33.php"  method="post" enctype="multipart/form-data">

								    <div class="form-group">
								      
								      <input type="file" onchange="this.form.submit()" class="form-control" name="fileToUpload" id="fileToUpload"  onkeypress="unsetnameError(false);" >
								    </div>

								    <!-- <button type="submit" class="btn btn-primary">Upload Image</button> -->
								 
								     <br />						    
						     </form>  
            </div>
        </div>
    </div>
</div>
</p>
<!--                ID Proof 2 Image End ------------------------------- -->



        </div>
      </div>
    </div>
  </section>
  <!-- /contact -->










<!-- Common Area Bottom ----------------------- -->
<!-- footer -->
<?php 
}
include("footer.php");
?>


</body>
</html>