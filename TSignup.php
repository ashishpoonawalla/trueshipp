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
            <li class="list-inline-item"><a class="h3 text-primary font-secondary" href="#">Transporter Signup</a></li>
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
						
        if(isset($_POST['temail']) && isset($_POST['tpassword']) && isset($_POST['tpassword2']) && isset($_POST['tfullname'])) {
        
          if( ($_POST['tpassword']) != ($_POST['tpassword2']) )  {

            ?>
            <div data-form-alert="true">
                              <div data-form-alert-warning="true">Password not match with Confirm Pasword!</div><br><br><br><br><br><br><br>
                              <a href="TSignup.php"  >Signup Transporter</a>
                          </div>
              <?php
          }  else {

        

              $temail = ($_POST['temail']);
              $tpassword = ($_POST['tpassword']);
              $tfullname = ($_POST['tfullname']);
              $tphone = ($_POST['tphone']);
                        
              $tpassword = md5($tpassword);
              $verifycode = rand(10000000,99999999);
              require('db.php');
		
          $sql="INSERT INTO seller_info(username, password, full_name, phone, verifycode) Values('$temail','$tpassword','$tfullname','$tphone','$verifycode') " ;
        //$sql="INSERT INTO seller_info('username', 'password', 'store_name' ) Values('$email','$pass','$snm')" ;

				if ($conn->query($sql) === TRUE) {
          //------------ profile Image
          $imagePath = "assets/imagesu/pro2.jpg";
          $newPath = "assets/imagesu/";
          $ext = '.jpg';
          $newName  = $newPath.$temail.$ext;

          $copied = copy($imagePath , $newName);

          
          //------------ ID Image 1
          $imagePath = "assets/imagesu/noimg.png";
          $newPath = "assets/imagesu/";
          $ext = '.png';
          $newName  = $newPath.$temail."ID1".$ext;
          $copied = copy($imagePath , $newName);

          //------------ ID Image 2
          $imagePath = "assets/imagesu/noimg.png";
          $newPath = "assets/imagesu/";
          $ext = '.png';
          $newName  = $newPath.$temail."ID2".$ext;
          $copied = copy($imagePath , $newName);

          //------------ RC Image 
          $imagePath = "assets/imagesu/noimg.png";
          $newPath = "assets/imagesu/";
          $ext = '.png';
          $newName  = $newPath.$temail."ID3".$ext;
          $copied = copy($imagePath , $newName);
          //------------ Vehicle Image
          $imagePath = "assets/imagesu/noimg.png";
          $newPath = "assets/imagesu/";
          $ext = '.png';
          $newName  = $newPath.$temail."ID4".$ext;
          $copied = copy($imagePath , $newName);
          //------------ Vehicle Image 2
          $imagePath = "assets/imagesu/noimg.png";
          $newPath = "assets/imagesu/";
          $ext = '.png';
          $newName  = $newPath.$temail."ID5".$ext;
          $copied = copy($imagePath , $newName);
//------------------ Send email ------------------------
//session_start();
$_SESSION["eml_to"] = $temail;
$_SESSION["eml_sub"] = "Account created successfully.";
$_SESSION["eml_mes"] = "Dear $tfullname, <br><br>Your trueshipp transporter account created succesfully.<br>Your code for verify on trueshipp: $verifycode<br><br><a href='https://trueshipp.com/ULogin.php'>Click here to login</a>";
$_SESSION["eml_bcc"] = "trueshipp@gmail.com";

include_once("emailsend.php");
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
      }
					
    }else{
						
					
						
						?>




          <form action="#" method="post" data-form-title="Signup Transporter">
            <input type="email" class="form-control mb-3" id="temail" name="temail" minlength="5" maxlength="100" placeholder="Email as Username"  required>            
            <input type="password" class="form-control mb-3" id="tpassword" minlength="8" name="tpassword" maxlength="50" placeholder="Password" required>
            <input type="password" class="form-control mb-3" id="tpassword2" minlength="8" name="tpassword2" maxlength="50" placeholder="Confirm Password" required>
            <input type="text" class="form-control mb-3" id="tfullname" name="tfullname" maxlength="100" placeholder="Full Name" required>
            <input type="text" class="form-control mb-3" id="tphone" minlength="8" name="tphone" maxlength="20" placeholder="Mobile No: +91 XXXXXXXXXX" required>
            
            <input type="checkbox" id="terms" name="terms" value="Terms" required>
            <label for="vehicle1"> I agree with the <a href='http://localhost/trueshipp/termsofuse.php'>Terms</a> 
            & <a href='http://localhost/trueshipp/privacy.php'>Privacy</a> of Trueshipp</label><br>
            
            <button type="submit" value="send" class="btn btn-primary">Signup Now</button>
          </form>

          <?php
						}
						?>
                    <br/>
                      
                      <a href="TLogin.php"  >Transporter Login</a>
                      <br/>

        </div>
        <div class="col-lg-4">
          <p class="mb-5"><br><br><br><br><br><br><br><br><br><br><br><br></p>
          
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