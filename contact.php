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
            <li class="list-inline-item"><a class="h3 text-primary font-secondary" href="#">Contact Us</a></li>
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
        if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile'])){
               
          //------------------ Send email ------------------------
          //session_start();

          $name = $_POST['name'];
          $email = $_POST['email'];
          $mobile = $_POST['mobile'];
          $desc = $_POST['desc'];
          
          
          $_SESSION["eml_to"] = "trueshipp@gmail.com";
          $_SESSION["eml_sub"] = "New message from contact form. ";
          $_SESSION["eml_mes"] = "Dear Admin, <br><br>New message recieve from: 
                                  <br>Name: $name,
                                  <br>Email: $email,
                                  <br>Mobile: $mobile,                                  
                                  <br><br>Message: $desc<br>
                                  <br>";
          $_SESSION["eml_bcc"] = "trueshipp@gmail.com";

          include_once("emailsend.php");

          
          ?>
          <div class="alert alert-success" role="alert">
                Your message send successfully. We'll contact you soon..
                              </div>
                              <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>                              
<?php
        }else {
?>
          <form action="contact.php" method="post">
            <input type="text" class="form-control mb-3" name="name" placeholder="Your Name" maxlength="200" required>            
            <input type="email" class="form-control mb-3" name="email" placeholder="Your Email" maxlength="200" required>            
            <input type="text" class="form-control mb-3" name="mobile" placeholder="Mobile No." maxlength="20" required>            
           
            <textarea name="desc" class="form-control mb-3" placeholder="Details" minlength="20" maxlength="300" required></textarea>
            <button type="submit" value="send" class="btn btn-primary">Submit</button>
          </form>

<?php } ?>

         


<br /><br /><br /><br /><br /><br /><br />

                

        </div>
        <div class="col-lg-4">
          <h3>Trushipp</h3>
          <p>Mr. Sanskar Rathore
          <br>BTI Chowk Dubey Complex
          <br>Ward no 17, Chandaniyapara, Janjgir
          <br>Janjgir-Champa, Chhattisgarh. 495668</p>
         
          <p>Phone : +91 88158 84313</p>
          <p>Email: trueshipp.info@gmail.com</p>

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