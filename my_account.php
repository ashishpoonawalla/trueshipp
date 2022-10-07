<?php 
try{
  // echo "<br><br>";
  session_start();
}catch(Exception $e){

}
include("header.php");


$uname = $_SESSION["username"] ;
	   
			
								
				require('db.php');
		
				$sql="SELECT * FROM user_info WHERE email='$uname' " ;
				$result = $conn->query($sql);

				 if($row = $result->fetch_assoc())
				  {
				  					

					
					$fnm =  $row["first_name"] . " ". $row["last_name"];
					$mob =  $row["mobile"];
					$uid = $row["user_id"];
					$add = $row["address"];
          $cit = $row["city"];
          $pin = $row["pin"];
          $date = $row["Date"];
          $sta = $row["status1"];

          if ($add == "" ) $add = "..";
          if ($cit == "" ) $cit = "..";
          if ($pin == "" ) $pin = "..";


          $theDate    = new DateTime($date);
          $stringDate = $theDate->format('Y-M-d');
          list($year,$month,$day) = explode("-",$stringDate);

          $date2 =  $day.'-'.$month.'-'.$year;
										
				
				
				} 
?>

<!-- Common Area Top ------------------ -->







<!-- page title -->
<section class="page-title-section overlay" style="background: url(images/backgrounds/tra1.jpg) no-repeat center center;" >
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <ul class="list-inline custom-breadcrumb">
            <li class="list-inline-item"><a class="h3 text-primary font-secondary" href="#">My Account</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- /page title -->
  
  <!-- section -->
  <section class="section-sm">
    <div class="container">
      <div class="row">
        <div class="col-3 mb-4">
          <!-- course thumb -->
          <!--<img src="./assets/imagesu/<?php echo $uname; ?>.jpg" style="height: 200px;" > -->
          <img src="./assets/imagesu/<?php echo $uname; ?>.jpg?t=<?php echo filemtime('./assets/imagesu/'.$uname.'.jpg'); ?>" style="height: 200px;" >
        </div>
      </div>
      <!-- course info -->
      <div class="row align-items-center ">
        <div class="col-xl-3 order-1 col-sm-6 mb-4 mb-xl-0">
          <h3><?php echo $fnm ?></h3>
        </div>
        <div class="col-xl-6 order-sm-3 order-xl-2 col-12 order-2">
          <ul class="list-inline text-xl-center">
            
            <li class="list-inline-item mr-4 mb-3 mb-sm-0">
              <div class="d-flex align-items-center">
                <i class="ti-alarm-clock text-primary icon-md mr-2"></i>
                <div class="text-left">
                  <h6 class="mb-0">Registed On</h6>
                  <p class="mb-0"><?php echo $date2; ?></p>
                </div>
              </div>
            </li>
            
          </ul>
        </div>
        <div class="col-xl-3 text-sm-right text-left order-sm-2 order-3 order-xl-3 col-sm-6 mb-4 mb-xl-0">
          <a href="setting.php" class="btn btn-primary">Edit Profile</a>
        </div>
        <!-- border -->
        <div class="col-12 mt-4 order-4">
          <div class="border-bottom border-primary"></div>
        </div>
      </div>
      <!-- course details -->
      <div class="row">
        <div class="col-4 mb-4">
          <h4>Address</h4>
          <p>Address: <?php echo $add; ?></p>
          <p>City: <?php echo $cit; ?></p>
          <p>Pin :<?php echo $pin; ?></p>
        </div>
        <div class="col-4 mb-4">
          <h4>ID Proof 1</h4>
          <!-- <p><img src="./assets/imagesu/<?php echo $uname; ?>ID1.png" class="img-fluid w-100" ></p> -->
          <p><img src="./assets/imagesu/<?php echo $uname; ?>ID1.png?t=<?php echo filemtime('./assets/imagesu/'.$uname.'ID1.png'); ?>" class="img-fluid w-100"  ></p>
        </div>
        <div class="col-4 mb-4">
          <h4>Id Proof 2</h4>
          <!-- <p><img src="./assets/imagesu/<?php echo $uname; ?>ID2.png" class="img-fluid w-100" ></p> -->
          <p><img src="./assets/imagesu/<?php echo $uname; ?>ID2.png?t=<?php echo filemtime('./assets/imagesu/'.$uname.'ID2.png'); ?>" class="img-fluid w-100"  ></p>
        </div>
        <!--
        <div class="col-12 mb-4">
          <h3 class="mb-3">Your Jobs</h3>
          <div class="col-12 px-0">
            <div class="row">
              <div class="col-md-6">
                <ul class="list-styled">
                  <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                  <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                  <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>

                </ul>
              </div>
              <div class="col-md-6">
                <ul class="list-styled">
                  <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                  <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>

                </ul>
              </div>
            </div>
          </div>
        </div>
        -->
        
        </div>
       
        
      </div>
    </div>
  </section>
  <!-- /section -->








<!-- Common Area Bottom ----------------------- -->
<!-- footer -->
<?php 
include("footer.php");
?>



</body>
</html>