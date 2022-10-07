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
            <li class="list-inline-item"><a class="h3 text-primary font-secondary" href="#">#</a></li>
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


            <?php

                

                    $email80 = $_POST['tunm1'];
                    $name80 =  $_POST['tfnm1'];
                    $subject = $_POST['subject'];
                    $message = $_POST['message'];
                     
                   
                $uname80 = $_SESSION["username"] ; 	
                $fname80 =$_SESSION["first_name"];

            //------------------ Send email ------------------------
                  //session_start();
                  $_SESSION["eml_to"] = $email80;

                  $_SESSION["eml_sub"] = "Subject: $subject ";

                  $_SESSION["eml_mes"] = "Dear $name80, <br><br>$fname80 ($uname80) is sending message to you<br>
                                          Message:  $message";

                  $_SESSION["eml_bcc"] = "trueshipp@gmail.com";

                  include_once("emailsend.php");
                  
                  //------------- End send email -------------------------

                

            ?>
        Message Send Succesfully
        
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

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