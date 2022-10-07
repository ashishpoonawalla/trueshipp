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
            <li class="list-inline-item"><a class="h3 text-primary font-secondary" href="#">User Signup</a></li>
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
						
						
      
if(isset($_POST['uemail']) && isset($_POST['upassword']) && isset($_POST['upassword2']) && isset($_POST['ufullname'])) {

    if( ($_POST['upassword']) != ($_POST['upassword2']) )  {

      ?>
                    <div data-form-alert="true">
                        <div data-form-alert-warning="true">Password not match with Confirm Pasword!</div><br><br><br><br><br><br><br>
                        <a href="USignup.php"  >Signup User</a>
                    </div>
        <?php
    }  else {


        $uemail = ($_POST['uemail']);
        $upassword = ($_POST['upassword']);
        $ufullname = ($_POST['ufullname']);
        $uphone = ($_POST['uphone']);
        $verifycode = rand(10000000,99999999);

        $upassword = md5($upassword);
                  
        require('db.php');
		
				$sql="INSERT INTO user_info(email, password, first_name, mobile, verifycode) Values('$uemail','$upassword','$ufullname','$uphone','$verifycode') " ;
			//$sql="INSERT INTO seller_info('username', 'password', 'store_name' ) Values('$email','$pass','$snm')" ;

				if ($conn->query($sql) === TRUE) {

         //------------ Pro image
          $imagePath = "assets/imagesu/pro2.jpg";
          $newPath = "assets/imagesu/";
          $ext = '.jpg';
          $newName  = $newPath.$uemail.$ext;
          $copied = copy($imagePath , $newName);


          //------------ ID Image 1
          $imagePath = "assets/imagesu/noimg.png";
          $newPath = "assets/imagesu/";
          $ext = '.png';
          $newName  = $newPath.$uemail."ID1".$ext;
          $copied = copy($imagePath , $newName);

          //------------ ID Image 2
          $imagePath = "assets/imagesu/noimg.png";
          $newPath = "assets/imagesu/";
          $ext = '.png';
          $newName  = $newPath.$uemail."ID2".$ext;
          $copied = copy($imagePath , $newName);
          ?>

          <?php
          //------------------ Send email ------------------------
          //session_start();
          $_SESSION["eml_to"] = $uemail;
          $_SESSION["eml_sub"] = "Account created successfully.";
          $_SESSION["eml_mes"] = "Dear $ufullname, <br><br>Your trueshipp user account created succesfully.
                                  <br>Your code for verify on trueshipp: $verifycode<br>
                                  <br><a href='https://trueshipp.com/ULogin.php'>Click here to login</a>";
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
              <div data-form-alert-warning="true">Some Error when creating account!, Or email already exists!</div><br><br><br><br><br><br><br>
          </div>
						<?php
						
				    //echo "Error Inserting record: " . $conn->error;
				}

						
				$conn->close();
      }
  }else{
						
					
						
						?>




          <form action="#" method="post" data-form-title="Signup Transporter">
            <input type="email" class="form-control mb-3" id="uemail" name="uemail" minlength="8" maxlength="150" placeholder="Email" required>            
            <input type="password" class="form-control mb-3" id="upassword" minlength="8" maxlength="50" name="upassword" placeholder="Password" required>
            <input type="password" class="form-control mb-3" id="upassword2" minlength="8" maxlength="50" name="upassword2" placeholder="Confirm Password" required>
            <input type="text" class="form-control mb-3" id="ufullname"  name="ufullname" placeholder="Full Name" maxlength="50" required>
            <input type="text" class="form-control mb-3" id="uphone" minlength="8" name="uphone" placeholder="Mobile No: +91 XXXXXXXXXX" maxlength="20" required>
            
            <input type="checkbox" id="terms" name="terms" value="Terms" required>
            <label for="vehicle1"> I agree with the <a href='http://localhost/trueshipp/termsofuse.php'>Terms</a> 
            & <a href='http://localhost/trueshipp/privacy.php'>Privacy</a> of Trueshipp</label><br>
            
            <button type="submit" value="send" class="btn btn-primary">Signup Now</button>
          </form>

          <?php
  }
						?>
                        <br/>
                      
                      <a href="ULogin.php"  >User Login</a>
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