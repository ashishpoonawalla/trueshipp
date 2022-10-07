<?php 
include("header.php");
?>

<!-- Common Area Top ------------------ -->










<!-- Search Bar -->
<section class="page-title-section overlay" style="background: url(images/backgrounds/tra1.jpg) no-repeat center center;" >
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        
        <a class="h3 text-primary font-secondary" href="#">Chat Box</a>
        
        
      </div>
    </div>
  </div>
</section>
<!-- /Search Bar -->

  
  <!-- notice -->
  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-8">
         

        <ul class="list-unstyled">



              <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Subject</th>
                      <th scope="col">Date</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <th scope="row"><img class="" src="images/transporter/pic1.jpg" style="width: 50px;" ></th>
                          <td>Message </td>
                          <td>12 Apr 2021</td>
                          <td>Open</td>
                      </tr>
                      
                      <tr>
                          <th scope="row"><img class="" src="images/transporter/pic1.jpg" style="width: 50px;" ></th>
                          <td>Message </td>
                          <td>12 Apr 2021</td>
                          <td>Open</td>
                      </tr>
                      
                      <tr>
                          <th scope="row"><img class="" src="images/transporter/pic1.jpg" style="width: 50px;" ></th>
                          <td>Message </td>
                          <td>12 Apr 2021</td>
                          <td>Open</td>
                      </tr>
                      
                      <tr>
                          <th scope="row"><img class="" src="images/transporter/pic1.jpg" style="width: 50px;" ></th>
                          <td>Message </td>
                          <td>12 Apr 2021</td>
                          <td>Open</td>
                      </tr>
                      
                      <tr>
                          <th scope="row"><img class="" src="images/transporter/pic1.jpg" style="width: 50px;" ></th>
                          <td>Message </td>
                          <td>12 Apr 2021</td>
                          <td>Open</td>
                      </tr>
                      
                      
                      <tr>
                          <th scope="row"><img class="" src="images/transporter/pic1.jpg" style="width: 50px;" ></th>
                          <td>Message </td>
                          <td>12 Apr 2021</td>
                          <td>Open</td>
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

        <div class="col-4">
         
        <div style="padding: 10px; width: 400px; height:470px;   overflow-y: scroll; border: solid 1px #000; position: fixed; right: 0;
bottom: 0; background-color: white; z-index: 100;"    >
            <div class="containerchat">
            <img src="./assets/imagesu/pro2.jpg" style="width: 40px; height: 40px;" alt="Avatar">
            <p>Hello. How are you today?</p>
            <span class="time-rightchat">11:00</span>
            </div>

            <div class="containerchat darkerchat">
            <img src="./assets/imagesu/pro2.jpg" style="width: 40px; height: 40px;" alt="Avatar" class="right">
            <p>Hey! I'm fine. Thanks for asking!</p>
            <span class="time-leftchat">11:01</span>
            </div>

            <div class="containerchat">
            <img src="./assets/imagesu/pro2.jpg" style="width: 40px; height: 40px;" alt="Avatar">
            <p>Hello. How are you today?</p>
            <span class="time-rightchat">11:00</span>
            </div>

            <div class="containerchat darkerchat">
            <img src="./assets/imagesu/pro2.jpg" style="width: 40px; height: 40px;" alt="Avatar" class="right">
            <p>Hey! I'm fine. Thanks for asking!</p>
            <span class="time-leftchat">11:01</span>
            </div>

            <div class="containerchat">
            <img src="./assets/imagesu/pro2.jpg" style="width: 40px; height: 40px;" alt="Avatar">
            <p>Sweet! So, what do you wanna do today?</p>
            <span class="time-rightchat">11:02</span>
            </div>

            <div class="containerchat darkerchat">
            <img src="./assets/imagesu/pro2.jpg" style="width: 40px; height: 40px;" alt="Avatar" class="right">
            <p>Nah, I dunno. Play soccer.. or learn more coding perhaps?</p>
            <span class="time-leftchat">11:05</span>
            </div>

            <form onsubmit="myFunction()">
            <textarea onsubmit="myFunction()" name="message" autofocus="autofocus" class="form-control mb-3" style="height: 70px;" placeholder=""></textarea>
             <input type="submit" > 
            </form>
        </div>


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

<script>
  if (!("autofocus" in document.createElement("input"))) {
    document.getElementById("message").focus();
  }

  function myFunction(){
    alert('Hello');
  }
</script>


</body>
</html>