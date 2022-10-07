<?php 
try{
  // echo "<br><br>";
  session_start();
}catch(Exception $e){

}
include("header.php");
?>

<!-- Common Area Top ------------------ -->










<!-- Search Bar -->
<section class="page-title-section overlay" style="background: url(images/backgrounds/tra1.jpg) no-repeat center center;" >
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          
          <a class="h3 text-primary font-secondary" href="#">My Quotes (Projects)</a> <br />
          
          
          
        </div>
      </div>
    </div>
  </section>
  <!-- /Search Bar -->

  
  <!-- notice -->
  <section class="section">
    <div class="container">
      <div class="row">


        <div class="col-12">
          <ul class="list-unstyled">


            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Active Quotes</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">In Progress</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Delivered Jobs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Completed Jobs</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Cancel Jobs</a>
                </li>
              </ul>
              
              <br /><br />

            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Job Title</th>
                    <th scope="col">My Bid</th>
                    <th scope="col">Date</th>
                    <th scope="col">Option</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">2015 Car </td>
                        <td>₹ 5,000.00 </td>
                        <td>12 Apr 2021</td>
                        <td>View Job</td>
                    </tr>
                     
                    
                    <tr>
                        <td scope="row">2015 Car </td>
                        <td>₹ 5,000.00 </td>
                        <td>12 Apr 2021</td>
                        <td>View Job</td>
                    </tr>
                     
                    
                    <tr>
                        <td scope="row">2015 Car </td>
                        <td>₹ 5,000.00 </td>
                        <td>12 Apr 2021</td>
                        <td>View Job</td>
                    </tr>
                     
                    
                    <tr>
                        <td scope="row">2015 Car </td>
                        <td>₹ 5,000.00 </td>
                        <td>12 Apr 2021</td>
                        <td>View Job</td>
                    </tr>
                     
                    
                    <tr>
                        <td scope="row">2015 Car </td>
                        <td>₹ 5,000.00 </td>
                        <td>12 Apr 2021</td>
                        <td>View Job</td>
                    </tr>
                     
                    
                    <tr>
                        <td scope="row">2015 Car </td>
                        <td>₹ 5,000.00 </td>
                        <td>12 Apr 2021</td>
                        <td>View Job</td>
                    </tr>
                     
                    




                </tbody>
              </table>








            
          </ul>
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!-- /notice -->











<!-- Common Area Bottom ----------------------- -->
<!-- footer -->
<?php 
include("footer.php");
?>


</body>
</html>