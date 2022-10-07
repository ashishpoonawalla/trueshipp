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
            <li class="list-inline-item"><a class="h3 text-primary font-secondary" href="#">Verify User</a></li>
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
       
            <form action="UverifyCH.php" method="POST" data-form-title="Verify User">              
              
                <div class="form-group">
                    <input type="text" class="form-control" id="code1" name="code1" placeholder="Put email veification code here" required>
                </div>
                
                
                <button type="submit" class="btn btn-primary"  >Vierfy me</button>

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

<br><br><br>
<a class="btn btn-success" href="UverifyResend.php"  >Resend email verify code again..</a>

                              <br/> <br/> <br/> <br/>
                          
        
        
        
        
        <!--
        <form action="#">
            <input type="email" class="form-control mb-3" id="tEmail" name="tEmail" placeholder="Email" required>            
            <input type="password" class="form-control mb-3" id="tPassword" name="tPassword" placeholder="Password" required>
            
            <button type="submit" value="send" class="btn btn-primary">Login</button>
          </form>
-->
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