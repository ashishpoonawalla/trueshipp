<?php 
try{
  // echo "<br><br>";
  session_start();
}catch(Exception $e){

}
include("header.php");
?>

<!-- Common Area Top ------------------ -->




<!-- page title -->
<section class="page-title-section overlay" style="background: url(images/backgrounds/tra1.jpg) no-repeat center center;" >
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <ul class="list-inline custom-breadcrumb">
            <li class="list-inline-item"><a class="h3 text-primary font-secondary" href="#">Post Job - Finished</a></li>
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
        <div class="col-lg-12 mb-4 mb-lg-0">
          
        <?php
							//session_start();
							$pid = $_SESSION["pidIMG"];
		?>
          <p class="mb-5" style="text-align: center; ">
		  	<a href="Job_detail.php?jobid=<?php echo $pid; ?>" target="_blanck" class="btn btn-primary">Preview Job</a>
		  </p>

		  <p class="mb-5">
		  	<img class="img-fluid w-100" src="images/mess1.png" alt="message: waiting for verification, your post uploaded soon.">			
		  </p>

		  <p class="mb-5" style="text-align: center; ">
		  	<a href="index.php" class="btn btn-primary">go to home page</a>
		  </p>
          
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