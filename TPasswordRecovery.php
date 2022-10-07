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
            <li class="list-inline-item"><a class="h3 text-primary font-secondary" href="#">Transporter Password Recovery</a></li>
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

          if(isset ($_POST['code1']) && isset ($_POST['pass11'])  && isset ($_POST['pass22'])){
            
            $code1 = $_POST['code1'];
            $pass11 = $_POST['pass11'];
            $pass22 = $_POST['pass22'];

           
            $verifycode = $_SESSION["passcode"];
            
            if ($pass22 != $pass11){
                echo "New password and Re-type pasword not match... <br><br><a href='TForgetPassword.php' >Goto forgot password</a>";
            }else if ($verifycode != $code1){
                echo "Code not match... <br><br><a href='TForgetPassword.php' >Goto forgot password</a>";
            }else {
                
                $fpuname=$_SESSION["fpuname"];                

                    require('db.php');
                    $pass = md5($pass11);
                    $sql="UPDATE seller_info SET password='$pass' Where username='$fpuname' " ;
                
                    if ($conn->query($sql) === TRUE) {
                        echo "Your password change/recover succesfully.<br><br><a href='TLogin.php'>Login Now</a>";
                    }
                    else
                    {
                        echo "Email not found... <br><br><a href='TForgetPassword.php' >Goto forgot password</a>";
                    }
            }
          }else{
        ?>
        
            Password Recovery<br><br>
            <form action="#" method="POST" data-form-title="Password Recovery User">              
              
                <div class="form-group">
                    <input type="text" class="form-control" id="code1" name="code1" placeholder="Password Recovery Code" required>
                </div>
                <div class="form-group">
                <input type="password" class="form-control mb-3" id="pass11" minlength="8" name="pass11" placeholder="New Password" required>
            
                </div>
                <div class="form-group">
                <input type="password" class="form-control mb-3" id="pass22" minlength="8" name="pass22" placeholder="Re-type Password" required>
            
                </div>
               
                <button type="submit" class="btn btn-primary"  >Change Password</button>

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