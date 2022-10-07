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
            <li class="list-inline-item"><a class="h3 text-primary font-secondary" href="#">Password Recovery</a></li>
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
        <div class="col-md-6">
        <br /><br />

        <?php 

          if(isset (	$_POST['uemail'])){
            
            $fpuname=$_POST['uemail'];
            $verifycode = rand(10000000,99999999);
            $_SESSION["fpuname"] = $fpuname;
            $_SESSION["passcode"] = $verifycode;

            require('db.php');
		
            $sql="UPDATE seller_info SET codepass='$verifycode' Where username='$fpuname'" ;
          
            if ($conn->query($sql) === TRUE) {


               //------------------ Send email ------------------------
              //session_start();
              $_SESSION["eml_to"] = $fpuname;
              $_SESSION["eml_sub"] = "Password Recovery";
              $_SESSION["eml_mes"] = "Your password recovery code is $verifycode";
              $_SESSION["eml_bcc"] = "trueshipp@gmail.com";

              include_once("emailsend.php");

              echo "Code sent to email. It'll take few minutes to got email.<br><br><a href='TPasswordRecovery.php'>Click here to recover your password</a>";
              //header('Location: UPasswordRecovery.php');
            }
            else
            {
              echo "Email not found...<br><br><a href='TForgetPassword.php' >Goto forgot password</a> ";
            }

          }else{
        ?>
        
            Send password recovery code to email<br><br>
            <form action="#" method="POST" data-form-title="Password Recovery User">              
              
                <div class="form-group">
                    <input type="text" class="form-control" id="uemail" name="uemail" placeholder="Email" required>
                </div>
               
                <button type="submit" class="btn btn-primary"  >Send</button>

            </form>
						
                        <br />
                        
  
                            <?php if (isset($_REQUEST['var'])){ 
                              ?>
                              <div class="alert alert-danger" role="alert">
                                <?php
                              echo $_REQUEST['var']; 
                              ?>
                              </div>
                              <?php                               } ?>
					
                  
                      <br/>
                      
                     
                      <br/>
                      <br/>
                    
                      <br/>
                      <br/>      
        
        <?php } ?>
        
      
        </div>

        <div class="col-md-6">
            
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