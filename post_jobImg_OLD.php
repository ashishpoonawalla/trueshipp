<?php 
include("header.php");
?>

<!-- Common Area Top ------------------ -->




<!-- page title -->
<section class="page-title-section overlay" style="background: url(images/backgrounds/tra1.jpg) no-repeat center center;" >
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <ul class="list-inline custom-breadcrumb">
            <li class="list-inline-item"><a class="h3 text-primary font-secondary" href="#">Post Job - Image Upload</a></li>
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
        <div class="col-lg-6 mb-4 mb-lg-0">
          
        <?php
							//session_start();
							$pid = $_SESSION["pidIMG"];
							require('db.php');	
							$sql="SELECT * FROM products where product_id=$pid" ;
			
							$result = $conn->query($sql);
			
							if($row = $result->fetch_assoc())
			  				{
							  	
							  	$img1= $row['product_image'];
								$img2= $row['img2'];
								$img3= $row['img3'];
								$img4= $row['img4'];
							}
							
						?>
                        
						
						
<!-- Main Image1 ------------------------------------------ -->						
						
                        	
							<div class="form-group">
								<label for="exampleInputEmail1">Main Image</label><br>
							    <img alt="140x140" width="200px" src="assets/images/<?php echo $img1; ?>">
                                
                            </div>
							
                             <form action="post_jobImg11.php"  method="post" enctype="multipart/form-data">

								    <div class="form-group">
								      
								      <input type="file" onchange="this.form.submit()" class="form-control" name="fileToUpload" id="fileToUpload"  onkeypress="unsetnameError(false);" >
								    </div>

								    <!-- <button type="submit" class="btn btn-primary">Upload Image</button> -->
								 
								     <br />						    
						     </form>                       
						<br>
						
						
<!-- Img 2 ------------------------------------------ 	-->			
						
                        	
							<div class="form-group">
								<label for="exampleInputEmail1">Image 2</label><br>
							    <img alt="140x140" width="150px" src="assets/images/<?php echo $img2; ?>">
                                
                            </div>
							
                             <form action="post_jobImg22.php"  method="post" enctype="multipart/form-data">

								    <div class="form-group">
								      
								      <input type="file"  onchange="this.form.submit()"  class="form-control" name="fileToUpload" id="fileToUpload"  onkeypress="unsetnameError(false);" >
								    </div>

								    <!-- <button type="submit" class="btn btn-primary">Upload Image</button> -->
								 
								     <br />						    
						     </form>
						<br>						
<!-- Img 3 ------------------------------------------ 		-->	
						
                        	
							<div class="form-group">
								<label for="exampleInputEmail1">Image 3</label><br>
							    <img alt="140x140" width="150px" src="assets/images/<?php echo $img3; ?>">
                                
                            </div>
							
                             <form action="post_jobImg33.php"  method="post" enctype="multipart/form-data">

								    <div class="form-group">
								      
								      <input type="file"  onchange="this.form.submit()"  class="form-control" name="fileToUpload" id="fileToUpload"  onkeypress="unsetnameError(false);" >
								    </div>

								    <!-- <button type="submit" class="btn btn-primary">Upload Image</button> -->
								 
								     <br />						    
						     </form>
						<br>						

<!-- Img 3 ------------------------------------------ 		-->		
						
                        	
							<div class="form-group">
								<label for="exampleInputEmail1">Image 4</label><br>
							    <img alt="140x140" width="150px" src="assets/images/<?php echo $img4; ?>">
                                
                            </div>
							
                             <form action="post_jobImg44.php"  method="post" enctype="multipart/form-data">

								    <div class="form-group">
								      
								      <input type="file"  onchange="this.form.submit()" class="form-control" name="fileToUpload" id="fileToUpload"  onkeypress="unsetnameError(false);" >
								    </div>

								    <!-- <button type="submit" class="btn btn-primary">Upload Image</button> -->
								 
								     <br />						    
						     </form>
						<br>						
							
						
						


        </div>
        <div class="col-lg-6">
		  ** Upload image and submit job for verification.<br><br>
          <p class="mb-5">
		  	<a href="post_jobfinish.php?jobid=<?php echo $pid; ?>" class="btn btn-primary">Submit to verify</a>
		  </p>

		  
          
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